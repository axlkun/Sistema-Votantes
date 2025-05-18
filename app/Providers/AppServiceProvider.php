<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Support\Facades\Session;

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
        Inertia::share([
            'auth' => [
                'user' => function () {
                    return Auth::check() ? Auth::user() : null;
                },
            ],
            'flash' => function () {
                return [
                    'success' => Session::get('success'),
                    'failure' => Session::get('failure'),
                ];
            },
        ]);
    }
}
