<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{

	public function login(Request $request)
	{
		//如果已经登录则跳转后台首页
		if($request->session()->has('adminuser')) {
            return redirect('/manage');
        }
		return view('manage.login');
	}
    //执行登录
    public function doLogin(Request $request)
    {
        //获取管理员账号
        $account = $request->input('name');
        $pass = md5($request->input('password'));
        //判断管理员账号是否存在
        if(!empty($account)) {
            //根据管理员账号获取管理员信息
            $info = \DB::table('admins')->where('name', $account)->first();
            //先判断账号是否存在
            if($info){
                //判断密码是否正确
                if ($info->password == $pass) {
                    session()->put("adminuser",$info);
                    //判断用户组，跳转对应的后台主页
                    return redirect("/manage");
                    
                } else {
                    return back()->with('msg', "账号或密码错误");
                }
                
            }else{
                return back()->with('msg',"账号不存在");
            }
            
        }
    }

    //执行退出
    public function logout(Request $request)
    {
       $request->session()->forget('adminuser');
       return redirect("/manage/login");
    }
}
