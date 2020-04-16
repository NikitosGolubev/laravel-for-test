<?php

namespace App\Providers;

use App\Services\UsersService\UsersService;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    public function boot()
    {
        $this->registerPolicies();

        Gate::define('engage-article', function ($user, $article) {
            return $user->articles()->exists($article);
        });
    }
}
