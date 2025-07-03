<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Hima;
use Illuminate\Support\Facades\View;

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
        View::composer('layouts.app', function ($view) {
            if (auth()->check() && auth()->user()->hasRole('admin')) {
                $view->with('himas', Hima::with('user')->get());
            }
        });

        //   View::composer('guest.app', function ($view) {
        //     if (auth()->check() && auth()->user()->hasRole('admin')) {
        //         $view->with('himas', Hima::with('user')->get());
        //     }
        // });
    }
}
