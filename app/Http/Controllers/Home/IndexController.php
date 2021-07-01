<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = null;
        $data['meta'] = DB::table('cms_website')->where('siteid',1)->first();
        $data['type'] = DB::table('cms_type')->where('display',1)->limit(6)->get();
        $data['news'] = DB::table('cms_news')->where('status',1)->orderBy('id','desc')->limit(9)->get();
        foreach($data['news'] as $vo){
            $data['tname'][] = DB::table('cms_type')->where('id',$vo->typeid)->value('english');
        }
        $data['product'] = DB::table('cms_product')->where('display',1)->orderBy('click','desc')->limit(6)->get();
        return view('home.index',compact('data'));
    }

    /**
     * 新闻资讯栏目路由
     * $name 要访问的栏目id
     * @return \Illuminate\Http\Response
     */
    public function type($name)
    {

        $data = null;
        $typeinfo = DB::table('cms_type')->where('english',$name)->first();
        if($name == 'news'){
            $data['news'] = DB::table('cms_news')->where('status',1)->orderBy('id','desc')->paginate(9);
        }else{
            $data['news'] = DB::table('cms_news')->where('typeid',$typeinfo->id)->where('status',1)->orderBy('id','desc')->paginate(9);
        }
        return view('home.blog_list',compact('data','typeinfo','name'));
    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name,$id)
    {
        $data = null;
        $data['type'] = DB::table('cms_type')->where('display',1)->limit(6)->get();
        $data['news'] = DB::table('cms_news')->where('id',$id)->first();
        $data['news_click'] = DB::table('cms_news')->where('status',1)->orderBy('click','desc')->limit(10)->get();

        //上一篇and下一篇
        $data['prev'] = DB::table('cms_news')
              ->where('id','<',$id)
              ->orderBy('id','desc')
              ->limit(1)
              ->get();
        //下一篇
        $data['next'] = DB::table('cms_news')
              ->where('id','>',$id)
              ->orderBy('id','asc')
              ->limit(1)
              ->get();
        DB::table('cms_news')->where('id',$id)->increment('click');
        return view('home.blog_show',compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function about($name)
    {
        $data = null;
        $data['page'] = DB::table('cms_page')->where('type',$name)->first();
        return view('home.page_show',compact('data'));
    }

    /**
     * 产品中心主页
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function product()
    {
        $data = null;
        $types = DB::table('cms_type')->where('english','product')->first();
        $data['product'] = DB::table('cms_product')->whereNull('deleted_at')->orderBy('click','desc')->paginate(9);
        //调产品分类
        $data['group'] = DB::select('select * from cms_type where pid=4 order by concat(path,id)');
        return view('home.shoplist',compact('data','types'));
    }

    /**
     * 产品分类
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function products($name)
    {  
        $data = null;
        $types = DB::table('cms_type')->where('english',$name)->first();
        $data['product'] = DB::table('cms_product')->where('typeid',$types->id)->whereNull('deleted_at')->orderBy('id','desc')->paginate(9);
        //调产品分类
        $data['group'] = DB::select('select * from cms_type where pid=4 order by concat(path,id)');
        return view('home.shoplist',compact('data','types'));
    }
    
    /**
     * 产品详情页
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function details($id)
    {
        $data = null;
        $data['product'] = DB::table('cms_product')->where('id',$id)->first();
        $data['relevant'] = DB::table('cms_product')->where('typeid',$data['product']->typeid)->whereNull('deleted_at')->limit(4)->get();//相关产品4条
        DB::table('cms_product')->where('id',$id)->increment('click');
        return view('home.shop_product',compact('data'));
    }

    /**
     * 视频
     *
     * @param  
     * @return \Illuminate\Http\Response
     */
    public function video()
    {
        $data = null;
        $data['video'] = DB::table('cms_video')->orderBy('id','desc')->paginate(12);
        return view('home.video',compact('data'));
    }
}
