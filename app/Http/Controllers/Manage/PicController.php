<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Services\NewsService;
class PicController extends Controller
{
    protected $newsService;

    // 利用 Laravel 的自动解析功能注入 NewsService 类
    public function __construct(NewsService $newsService)
    {
        $this->newsService = $newsService;
    }

    /**
     * 会员管理
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //客户列表页搜索
        $data = null;
        $data['pic'] = DB::table('cms_picture')->orderBy('id','asc')->get();
        return view('manage.pic.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.pic.create');
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
        if($input['type'] == 0){//新增图片
            // 图片上传
            if($request->hasFile('thumb')){
                $file = $request->file('thumb');
                $thumb = $this->newsService->pic($file);
            }else{
                $thumb = NULL;
            }

            $params = [
                'name' => $input['name'],
                'url' => $input['url'],
                'thumb' => $thumb,
                'remarks' => $input['remarks'],
            ];

            DB::table('cms_picture')->insert($params);
        }else{//修改
            // 检查图片是否做修改
            // if($request->hasFile('thumb')){
            //     $file = $request->file('thumb');
            //     $thumb = $this->newsService->pic($file);
            // }else{
            //     $thumb = $input['thumb'];
            // }
            // $params = [
            //     'name' => $input['name'],
            //     'url' => $input['url'],
            //     'thumb' => $thumb,
            //     'remarks' => $input['remarks'],
            // ];

            // DB::table('cms_picture')->where('id',$input['new_id'])->update($params);
        }
        
        return redirect('/manage/pic');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
