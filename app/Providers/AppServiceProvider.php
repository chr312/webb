<?php

namespace App\Providers;

// use Illuminate\Auth\Access\Gate;
// use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Support\ServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

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
        Gate::define('adminho', function(User $user){
            return $user-> role === '1';
        });
    }
}
