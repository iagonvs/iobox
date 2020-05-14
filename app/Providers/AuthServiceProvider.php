<?php

namespace App\Providers;


use Illuminate\Support\Facades\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Permission;
use App\User;
use App\Item;


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
    
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);
    
    
      $gate::define('isAdmin', function($user){
          return $user->user_type == 'admin';
      });
      $gate::define('isRegular', function($user){
        return $user->user_type == 'regular';
    });
    $gate::define('isAgencia', function($user){
        return $user->user_type == 'agencia';
      });
    }
}
