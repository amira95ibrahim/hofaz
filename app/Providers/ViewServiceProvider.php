<?php

namespace App\Providers;

use App\Models\NavSection;
use App\Services\CountryService;
use App\Services\KafalaService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('admin.countries.activeList', function ($view) {
            $view->with('countries', CountryService::getActiveCountries());
        });

        View::composer('admin.kafala_fields.activeList', function ($view) {
            $view->with('fields', KafalaService::getActiveKafalaFields());
        });

        View::composer('admin.kafala_types.activeList', function ($view) {
            $view->with('types', KafalaService::getActiveKafalaTypes());
        });

        View::composer('front.layout.main', function ($view) {
            $view->with('navSections', NavSection::active()->get());
        });
    }
}
