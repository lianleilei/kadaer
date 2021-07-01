<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class AboutController extends Controller
{

    /**
     * 关于我们
     *
     * @return \Illuminate\Http\Response
     */
    public function about($name)
    {
        $data['about'] = DB::table('cms_page')->where('type',$name)->first();
        return view('manage.company.about',compact('data'));
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
        $params = [
            'title' => $input['title'],
            'keywords' => $input['keywords'],
            'content' => $input['content'],
        ];
        
        DB::table('cms_page')->where('type',$input['ctype'])->update($params);
        return redirect('/manage/company/'.$input['ctype']);
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
