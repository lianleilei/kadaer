<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Services\NewsService;
class PersonalController extends Controller
{
    protected $newsService;

    // 利用 Laravel 的自动解析功能注入 NewsService 类
    public function __construct(NewsService $newsService)
    {
        $this->newsService = $newsService;
        $this->middleware('auth');
    }

    // public function __construct()
    // {
        
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = null;
        $data['user'] = Auth::user();
        $data['news'] = DB::table('cms_news')->where('uid',$data['user']->id)->where('status',1)->orderBy('id','desc')->paginate(8);
        $data['type'] = DB::table('cms_type')->where('display',1)->limit(6)->get();
        return view('personal.index',compact('data'));
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
        $data['type'] = DB::table('cms_type')->where('display',1)->limit(6)->get();
        return view('personal.contribute',compact('group','nbsp','data'));
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
        $uname = Auth::user();
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
                'content' => $input['content'],
                'username' => $uname->name,
                'uid' => $uname->id,
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
                'content' => $input['content'],
                'updated_at' => time(),
            ];

            DB::table('cms_news')->where('id',$input['new_id'])->update($params);
        }
        
        return redirect('/personal/article');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function article()
    {
        $data = null;
        //获取当前已认证用户id
        $uid = Auth::id();
        $data['news'] = DB::table('cms_news')->where('uid',$uid)->orderBy('id','desc')->paginate(2);
        $data['type'] = DB::table('cms_type')->where('display',1)->limit(6)->get();
        return view('personal.article',compact('data'));
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
