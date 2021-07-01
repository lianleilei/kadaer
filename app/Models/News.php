<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'cms_news';

    protected $fillable = [
        'typeid','title','type','content',
    ];

    public static $rulesCreate = [
        'title' => 'required|string',
        'typeid' => 'required|numeric',
        'type' => 'required|numeric',
        'content' => 'min:50',
    ];

    public static $rulesUpdate = [
    	''
    ];

    public static $rulesGet = [
    	'id' => 'required|numeric',
    ];
}
