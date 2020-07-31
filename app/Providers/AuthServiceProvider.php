<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manageUsers', function ($user) {
            return $user->hasRole('sys_admin');
        });

        Gate::define('selfUser', function ($user, $current_user) {
            return $user->id === $current_user->id;
        });

        Gate::define('manageChurches', function ($user) {
            return $user->hasRole('sys_admin');
        });

        Gate::define('selfChurch', function ($user, $church) {
            return $user->church_id === $church->id;
        });

        Gate::define('manageMembership', function($user){
            return $user->hasRole('Secretaria');
        });

        //
    }
}
