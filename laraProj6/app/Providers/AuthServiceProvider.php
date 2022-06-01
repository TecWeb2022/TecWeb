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
    public function boot() {
        $this->registerPolicies();

    Gate::define('isAdmin', function ($user) {
        return $user->hasRole('admin');
    });

    Gate::define('isUser', function ($user) {
        return $user->hasRole('user');
    });
    
    Gate::define('isLoc', function ($user) {
        return $user->hasRole('loc');
    });
    
    Gate::define('isHost', function ($user) {
        return $user->hasRole('host');
    });
    
    Gate::define('isLocHost', function ($user) {
        return $user->hasRole(['host', 'loc']);
    });
    
    }
}
