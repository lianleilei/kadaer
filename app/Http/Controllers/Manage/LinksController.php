<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class LinksController extends Controller
{
    public function index()
    {
        $data = DB::table('cms_link')->orderBy('id','desc')->paginate(10);
        return view('manage.links.index',compact('data'));
    }

    public function create()
    {
        return view('manage.links.create');
    }

    public function store(Request $request)
    {
        //表单验证
        $input = $request->all();
        $validator = Validator::make($input, [
                'name' => 'required|string',
                'url' => 'required|string',//再加一个规则验证
                'username' => 'required|string',
                'passed' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/manage/links/create')
                        ->withErrors($validator)
                        ->withInput();
        } else {
            switch ($input['type']) {
                case 0:
                    $params = [
                        'name' => $input['name'],
                        'url'  => $input['url'],
                        'username' => $input['username'],
                        'passed' => $input['passed'],
                        'addtime' => time(),
                    ];

                    DB::table('cms_link')->insert($params);
                    return redirect('/manage/links');
                    break;

                default:
                    //修改
                    $params = [
                        'name' => $input['name'],
                        'url'  => $input['url'],
                        'username' => $input['username'],
                        'passed' => $input['passed'],
                    ];

                    DB::table('cms_link')->where('id',$input['link_id'])->update($params);
                    return redirect('/manage/links');
                    break;
            }

        }
    }

    public function show($id)
    {
        DB::table('cms_link')->where('id',$id)->update(['passed'=>1]);
        return redirect('/manage/links');
    }

    public function edit($id)
    {

        $data = DB::table('cms_link')->where('id',$id)->first();
        return view('manage.links.edit',compact('data'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('cms_link')->where('id',$id)->delete();
        return ['code'=>200,'msg'=>'ok'];
    }
}
