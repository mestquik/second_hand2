<?php

namespace App\Providers;

use App\Models\category;
use App\Models\Logo;
use App\Models\product;
use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Cache;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (!$this->app->runningInConsole()) {
            view()->share('categoriess', category::get());
            if (Logo::where('status','1')->first())
            {
                view()->share('sitelogo',Logo::where('status','1')->firstOrFail());

            }
            else
            {
                view()->share('sitelogo',Logo::first());

            }
        }
        }
    }
