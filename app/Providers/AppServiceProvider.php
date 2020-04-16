<?php

namespace App\Providers;

use App\Services\UsersService\UsersService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }


    public function boot(UsersService $users_service)
    {
        // Passing authenticated user to all views
        View::composer('*', function ($view) use ($users_service) {
            if ($users_service->isAuthenticated()) {
                $view->with('user', $users_service->currentAuth());
            }
        });
    }
}
