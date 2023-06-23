<?php

namespace App\Providers;
use Illuminate\Support\Facades\Gate;
use app\Models\User;
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
        Gate::define('admin', function (User $user) {
            return $user->role_name === 'admin';
        });

        Gate::define('penyewa', function (User $user) {
            return $user->role_name === 'penyewa';
        });

    }
}
