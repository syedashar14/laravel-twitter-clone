<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Idea;
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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //Role based Gate
        Gate::define('admin', function (User $user) : bool{
            return (bool) $user->is_admin;
        });

        //Permission based Gate
        Gate::define('idea.edit', function (User $user, Idea $idea) {
            return (bool) ($user->is_admin || $idea->user_id == $user->id);
        });

        //Permission based Gate
        Gate::define('idea.delete', function (User $user, Idea $idea) {
            return (bool) ($user->is_admin || $idea->user_id == $user->id);
        });
    }
}
