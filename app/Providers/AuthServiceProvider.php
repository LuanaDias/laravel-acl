<?php

namespace App\Providers;

//use Illuminate\Support\Facades\Gate as GateContract;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Notice;
use App\User;
use App\Permission;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        //\App\Notice::class => \App\Policies\NoticePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

       /* $gate->define('update-notice', function(User $user, Notice $postnotice){
            return $user->id == $postnotice->user_id;
        });*/
        
        $permissions = Permission::with('roles')->get();
        //view_post  = Manager, Editor
        //delete_post => Manager
        //edit_post = Manager
        foreach ($permissions as $permission) {

            $gate->define($permission->name, function(User $user) use ($permission){
                return $user->hasPermission($permission);
             });   
        }        
    }
}
