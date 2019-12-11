<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('isAdmin',function ($user){
            if($user->user_type == 'admin'){
                return true ;
            }
            return false;

        });




        Gate::define('isParoko',function ($user){

            if($user->user_type == 'paroko'){
                return true ;
            }
        });

        Gate::define('isDataEntry',function ($user){

            if($user->user_type == 'dataentry'){
                return true ;
            }
        });

        $this->registerPolicies();


    }
}
