<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Foundation\Application;
use App\Auth\CustomGuard;

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

        Auth::extend('driver_custom_guard', function(Application $app, string $name, array $config){
            return new CustomGuard(Auth::createUserProvider());
        });

        Auth::provider('driver_custom_provider', function(Application $app, array $config){
            return new CustomUserProvider();
        });
    }


}
