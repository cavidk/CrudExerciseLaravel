<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
    use Illuminate\Support\Facades\Gate;

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

        $this->registerPolicies();

        Gate::define('create_post', function (User $user, Post $post) {
            return $user->id === $post->user_id;
        });

        //add here edit_post
        Gate::define('edit_post', function (User $user, Post $post) {
            return $user->id === $post->user_id;
        });

        //add here delete_post
        Gate::define('delete_post', function (User $user, Post $post) {
            return $user->id === $post->user_id;
        });
    }
}

//TODO Authorization Gates
