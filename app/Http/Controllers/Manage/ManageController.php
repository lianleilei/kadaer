<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class ManageController extends Controller
{
    public function index()
    {
    	return view('manage.home');
    }


    public function website()
    {
    	$web = DB::table('cms_website')->first();
    	return view('manage.service.service',compact('web'));
    }

    public function webstore(Request $request)
    {
    	$input = $request->all();
    	$params = [
    		'title' => $input['title'],
    		'keywords' => $input['keywords'],
    		'description' => $input['description'],
    	];

    	DB::table('cms_website')->where('siteid',1)->update($params);
    	return redirect('/manage/website');
    }
}
