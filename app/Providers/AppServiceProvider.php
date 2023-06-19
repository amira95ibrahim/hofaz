<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
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
        Session::put('locale', 'ar');
//        $direction = '';
//        $float = 'left';
//        $lang = 'en';
//        if(Session::get('locale') == 'ar'){
            $lang = 'ar';
            $direction = '-rtl';
            $float = 'right';
            $reverseFloat = 'left';
//        }
        view()->share('lang', $lang);
        view()->share('direction', $direction);
        view()->share('float', $float);
        view()->share('reverseFloat', $reverseFloat);

        Relation::enforceMorphMap([
            'project' => 'App\Models\Project',
            'relief' => 'App\Models\Relief',
            'waqf' => 'App\Models\Waqf',
        ]);
    }
}
