<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
use App\Policies\PostPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
        Post::class => PostPolicy::class,
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

        $this->registerPolicies();

       /* Gate::define('create_post', function () {
            return Auth::user()->is_admin;
        });

        //add here edit_post
        Gate::define('edit_post', function () {
            return Auth::user()->is_admin;
        });

        //add here delete_post
        Gate::define('delete_post', function () {
            return Auth::user()->is_admin;
        });*/
    }
}

//TODO Authorization Gates
