<?php

namespace App\Providers;

use App\Models\profile;
use App\Models\Setting;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(!app()->runningInConsole()){
            $setting=profile::firstOr(function(){
                return profile::create([
                    'name'=>'site name',
                    'descriptian'=>'laravel'
                ]);
            });
            view()->share('setting',$setting);
        }
    }
}
