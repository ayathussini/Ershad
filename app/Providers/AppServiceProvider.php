<?php

namespace App\Providers;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
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
        View::share('user', 'user');
    }
    protected function mapApiRoutes()
{
    Route::middleware('api')
        ->prefix('api')
        ->group(base_path('routes/api.php'));
}

    
}
