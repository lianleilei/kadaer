<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'Home\IndexController@index');
Route::get('/type/{name}', 'Home\IndexController@type');//栏目
Route::get('/type/{name}/{id}.html', 'Home\IndexController@show');
Route::get('/product', 'Home\IndexController@product');//产品中心
Route::get('/product/{id}.html', 'Home\IndexController@details');//产品中心
Route::get('/product/{name}', 'Home\IndexController@products');//产品分类页

Route::get('/company/{name}', 'Home\IndexController@about');//关于我们
Route::get('/video', 'Home\IndexController@video');//改装视频

Auth::routes();
//后台管理路由组
Route::get('/manage/login',"Manage\LoginController@login");//后台登陆
Route::post('/manage/doLogin',"Manage\LoginController@doLogin");//执行登陆
Route::get('/manage/logout',"Manage\LoginController@logout");//执行退出登陆

Route::group(['prefix' =>'manage','middleware'=>'manage'],function(){
	Route::get('/',"Manage\ManageController@index");//后台主页

    //图片
    Route::get('/pic','Manage\PicController@index');
    Route::get('/pic/add','Manage\PicController@create');
    Route::post('/pic/store','Manage\PicController@store');//保存修改

	//栏目管理
    Route::get('/type','Manage\TypeController@index');
    Route::get('/type/add','Manage\TypeController@create');
    Route::post('/type/store','Manage\TypeController@store');//新增和修改
    Route::get('/type/edit/{id}','Manage\TypeController@edit');
    Route::get('/type/del/{id}','Manage\TypeController@destroy');//删除
    Route::get('/type/display/{id}','Manage\TypeController@exhibit');//显示导航

    //友链管理 
    Route::get('/links','Manage\LinksController@index');
    Route::get('/links/add','Manage\LinksController@create');
    Route::post('/links/store','Manage\LinksController@store');
    Route::get('/links/edit/{id}','Manage\LinksController@edit');
    Route::get('/links/del/{id}','Manage\LinksController@destroy');
    Route::get('/links/show/{id}','Manage\LinksController@show');

    //文章管理
    Route::get('/article','Manage\ArticleController@index');
    Route::get('/article/add','Manage\ArticleController@create');
    Route::post('/article/store','Manage\ArticleController@store');//创建和修改
    Route::get('/article/edit/{id}','Manage\ArticleController@edit');
    Route::get('/article/del/{id}','Manage\ArticleController@destroy');
    Route::get('/article/send/{id}','Manage\ArticleController@send');//是否发布

    //产品管理
    Route::get('/product','Manage\ProductController@index');
    Route::get('/product/add','Manage\ProductController@create');
    Route::get('/product/edit/{id}','Manage\ProductController@edit');
    Route::post('/product/store','Manage\ProductController@store');//创建和修改
    Route::get('/product/send/{id}','Manage\ProductController@send');//是否发布
    Route::get('/product/del/{id}','Manage\ProductController@destroy');
    
    //视频管理
    Route::get('/video','Manage\VideoController@index');
    Route::get('/video/add','Manage\VideoController@create');
    Route::post('/video/store','Manage\VideoController@store');
    Route::get('/video/edit/{id}','Manage\VideoController@edit');
    Route::get('/video/del/{id}','Manage\VideoController@destroy');
    //关于我们
    Route::get('/company/{name}','Manage\AboutController@about');
    Route::post('/company','Manage\AboutController@store');

    //网站设置
    Route::get('/website','Manage\ManageController@website');
    Route::post('/website/store','Manage\ManageController@webstore');



});