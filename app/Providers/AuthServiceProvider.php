<?php

namespace App\Providers;

//use Illuminate\Support\Facades\Gate as GateContract;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Notice;
use App\User;

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
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        $gate->define('update-notice', function(User $user, Notice $postnotice){
            return $user->id == $postnotice->user_id;
        });

        /*$this->registerPolicies($gate);

        $gate->define('update-notice',function(User $user,Notice $postnotice){
            return $user->id == $postnotice->user_id;
        });*/

        //
    }
}
