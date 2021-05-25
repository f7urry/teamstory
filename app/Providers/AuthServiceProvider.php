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
        $this->gateDefiner();
    }

    public function gateDefiner(){
        Gate::define('is_read', function($user){
            return $user->checkPermission()->is_read==1;
        });
        Gate::define('is_create', function($user){
            return $user->checkPermission()->is_create==1;
        });
        Gate::define('is_update', function($user){
            return $user->checkPermission()->is_update==1;
        });
        Gate::define('is_delete', function($user) {
            return $user->checkPermission()->is_delete==1;
        });
    }

}
