<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Services\NewsService;

class ArticleController extends Controller
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
        $res_news = DB::table('cms_news');

        if($request->has('search')){
            $search = $request->input('search');
            $res_news->where('title','like',"%{$search}%");
            $data['where']['search'] = $search;
        }
        $data['list'] = $res_news->orderBy('id','desc')->paginate(20);
        foreach($data['list'] as $key=>$vo){
            $data['tname'][] = DB::table('cms_type')->where('id',$vo->typeid)->value('name');
        }
        return view('manage.article.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //调用栏目分类
        $group = DB::select('select * from cms_type order by concat(path,id)');
        //获取path中的逗号数量,并重复空格
        foreach($group as $val){
            //一个逗号不加空格  超过一个加空格和└─
            if(substr_count($val->path,",") > 1){
                $nbsp[] = str_repeat("&nbsp;",substr_count($val->path,",")*4)."└─";
            }else{
                $nbsp[] = "";
            }
        }
        return view('manage.article.create',compact('group','nbsp'));
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
        $uname = $request->session()->get('adminuser');
        if($input['type'] == 0){
            // 图片上传
            if($request->hasFile('thumb')){
                $file = $request->file('thumb');
                $thumb = $this->newsService->thumb($file);
            }else{
                $thumb = NULL;
            }

            $params = [
                'typeid' => $input['typeid'],
                'title' => $input['title'],
                'thumb' => $thumb,
                'keywords' => $input['keywords'],
                'description' => $input['description'],
                'content' => $input['content'],
                'username' => $uname->name,
                'created_at' => time(),
            ];

            DB::table('cms_news')->insert($params);
        }else{
            // 检查图片是否做修改
            if($request->hasFile('thumb')){
                $file = $request->file('thumb');
                $thumb = $this->newsService->thumb($file);
            }else{
                $thumb = $input['thumb_db'];
            }
            $params = [
                'typeid' => $input['typeid'],
                'title' => $input['title'],
                'thumb' => $thumb,
                'keywords' => $input['keywords'],
                'description' => $input['description'],
                'content' => $input['content'],
                'updated_at' => time(),
            ];

            DB::table('cms_news')->where('id',$input['new_id'])->update($params);
        }
        
        return redirect('/manage/article');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = \DB::select('select * from cms_type order by concat(path,id)');
        //获取path中的逗号数量,并重复空格
        foreach($group as $val){
            //一个逗号不加空格  超过一个加空格和└─
            if(substr_count($val->path,",") > 1){
                $nbsp[] = str_repeat("&nbsp;",substr_count($val->path,",")*4)."└─";
            }else{
                $nbsp[] = "";
            }
        }
        $data = DB::table('cms_news')->where('id',$id)->first();
        return view('manage.article.edit',compact('data','group','nbsp'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('cms_news')->where('id',$id)->delete();
        return ['code'=>200,'msg'=>'ok'];
    }

    public function send($id)
    {
        DB::table('cms_news')->where('id',$id)->update(['status' => 1]);
        return redirect('/manage/article');
    }
}
