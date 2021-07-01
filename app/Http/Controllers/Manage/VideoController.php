<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Services\NewsService;

class VideoController extends Controller
{
    protected $newsService;

    // 利用 Laravel 的自动解析功能注入 NewsService 类
    public function __construct(NewsService $newsService)
    {
        $this->newsService = $newsService;
    }

    /**
     * 文章管理
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = ['where'=>[]];
        $res_news = DB::table('cms_video');

        if($request->has('search')){
            $search = $request->input('search');
            $res_news->where('title','like',"%{$search}%");
            $data['where']['search'] = $search;
        }
        $data['list'] = $res_news->orderBy('id','desc')->paginate(20);

        return view('manage.video.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.video.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        if($input['type'] == 0){
            // 图片上传
            if($request->hasFile('thumb')){
                $file = $request->file('thumb');
                $thumb = $this->newsService->thumb($file);
            }else{
                $thumb = NULL;
            }

            $params = [
                'title' => $input['title'],
                'thumb' => $thumb,
                'keywords' => $input['keywords'],
                'url' => $input['url'],
            ];

            DB::table('cms_video')->insert($params);
        }else{
            // 检查图片是否做修改
            if($request->hasFile('thumb')){
                $file = $request->file('thumb');
                $thumb = $this->newsService->thumb($file);
            }else{
                $thumb = $input['thumb_db'];
            }
            $params = [
                'title' => $input['title'],
                'thumb' => $thumb,
                'keywords' => $input['keywords'],
                'url' => $input['url'],
            ];

            DB::table('cms_video')->where('id',$input['id'])->update($params);
        }
        
        return redirect('/manage/video');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('cms_video')->where('id',$id)->first();
        return view('manage.video.edit',compact('data'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('cms_video')->where('id',$id)->delete();
        return ['code'=>200,'msg'=>'ok'];
    }

}
