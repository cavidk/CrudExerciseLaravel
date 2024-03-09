<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        /**
         *1.create_post
         *2.edit_post
         *3.delete_post
         */

        (new \Illuminate\Auth\Access\Gate)->define('create_post', function ($user) {
            return Auth::user()->is_admin;
        });

        //add here edit_post
        (new \Illuminate\Auth\Access\Gate)->define('edit_post', function ($user) {
            return Auth::user()->is_admin;
        });

        //add here delete_post
        (new \Illuminate\Auth\Access\Gate)->define('delete_post', function ($user) {
            return Auth::user()->is_admin;
        });

    }
}

//TODO Authorization Gates
