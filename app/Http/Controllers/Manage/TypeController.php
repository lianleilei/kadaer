<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        return view('Manage.type.index',compact('group','nbsp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        return view('manage.type.create',compact('group','nbsp'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $errType = null;
        $data = null;
        //表单验证
        $input = $request->all();
        $validator = Validator::make($input, [
                'name' => 'required|string',
                'ename' => 'required|string',
            ]);

        if ($validator->fails()) {
            $errType = 'errParam';
            $data = $validator;
        } else {
            $typeinfo = $input['typeid'];
            $typeid = explode(".",$typeinfo);
            if($input['type'] == 0){
                //判断添加几级栏目
                if($typeinfo == 0){ //一级栏目
                    $params = [
                        'name' => $input['name'],
                        'english' => $input['ename'],
                        'pid' => 0,
                        'path' => '0,',
                        'description' => $input['description'],
                        'keywords' => $input['keywords'],
                    ];
                }else{
                    //获取父级栏目信息
                    $params = [
                        'name' => $input['name'],
                        'english' => $input['ename'],
                        'pid' => $typeid[0],
                        'path' => $typeid[1].$typeid[0].',',
                        'description' => $input['description'],
                        'keywords' => $input['keywords'],
                    ];
                }
                
                DB::table('cms_type')->insert($params);
                return redirect('/manage/type');
            } else {
                if($typeinfo == ''){ //一级栏目
                    $params = [
                        'name' => $input['name'],
                        'english' => $input['ename'],
                        'pid' => 0,
                        'path' => '0,',
                        'description' => $input['description'],
                        'keywords' => $input['keywords'],
                    ];
                }else{
                    $params = [
                        'name' => $input['name'],
                        'english' => $input['ename'],
                        'pid' => $typeid[0],
                        'path' => $typeid[1].$typeid[0].',',
                        'description' => $input['description'],
                        'keywords' => $input['keywords'],
                    ];
                }
                DB::table('cms_type')->where('id',$input['edit_id'])->update($params);
                return redirect('/manage/type');
            }
            
        }
      
        return back()->with('msg',$this->errMsg->make($errType, $data));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = DB::table('cms_type')->where('id',$id)->first();
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
        return view('manage.type.edit',compact('type','group','nbsp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function exhibit($id)
    {
        $res = DB::table('cms_type');
        $bit = $res->where('id',$id)->value('display');
        if($bit == 0){
            $res->where('id',$id)->update(['display' => 1]);
        }else{
            $res->where('id',$id)->update(['display' => 0]);
        }
        
        return redirect('/manage/type');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("cms_type")->where('id',$id)->delete();
        return ['code'=>200,'msg'=>'ok'];
    }
}
