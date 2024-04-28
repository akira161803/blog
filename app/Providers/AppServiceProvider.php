<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        view()->composer('*', function ($view) {
            $view->with('gettypeBCategoryClass', function ($typeBCategory) {
                if ($typeBCategory === 100) {
                    return 'no_selection';
                } elseif ($typeBCategory === 99) {
                    return 'others';
                } elseif (isset(config('category.typeB')[$typeBCategory])) {
                    return config('category.typeB')[$typeBCategory]['class'];
                } else {
                    return 'default-class';
                }
            });
        });

        view()->composer('*', function ($view) {
            $view->with('getpostCategoryClass', function ($postCategory) {
                if ($postCategory === 100) {
                    return 'no_selection';
                } elseif ($postCategory === 99) {
                    return 'others';
                } elseif (isset(config('category.post')[$postCategory])) {
                    return config('category.post')[$postCategory]['class'];
                } else {
                    return 'default-class'; // ここで 'default-class' を返す
                }
            });
        });
        
    }
}
