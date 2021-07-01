<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //调产品分类
        $types = DB::select('select * from cms_type where pid=4 order by concat(path,id)');
        $new_type = DB::select('select * from cms_type where pid=1 order by concat(path,id)');
        View::share('key',$types);
        View::share('new_type',$new_type);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
