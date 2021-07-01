<?php

namespace App\Services;
use Illuminate\Support\Facades\Storage;
class NewsService
{
	//缩略图上传
	public function thumb($file)
	{	
		//本地上传
        $disk = Storage::disk('local');
        $filename = $filename = date('YmdHis').mt_rand(100,999).'.'.$file->getClientOriginalExtension();
        $path = $file->move(public_path().'/uploads/'.date('Ymd').'/',$filename);// 重命名保存
        $img_path = '/uploads/'.date('Ymd').'/'.$filename;
        return  $img_path;
	}

	//图片管理上传
	public function pic($file)
	{
        $disk = Storage::disk('local');
        $filename = $filename = date('YmdHis').mt_rand(100,999).'.'.$file->getClientOriginalExtension();
        $path = $file->move(public_path().'/uploads/picture/',$filename);// 重命名保存
        $img_path = '/uploads/picture/'.$filename;
        return $img_path;
	}
}