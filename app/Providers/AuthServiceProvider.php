<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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
   
        Gate::define('isSuperAdmin',function($users_roles){
            $rqt =  DB::select('select * from users  where id = ?  and activiter=true limit 1',[Auth::id()]);
            if($rqt!=null)
                if( $rqt[0]->role_id == 1)
                    return "isSuperAdmin";
        });
        Gate::define('isAdmin',function($users_roles){
            $rqt =  DB::select('select * from users  where id = ?  and activiter=true limit 1',[Auth::id()]);
            if($rqt!=null)
                if( $rqt[0]->role_id == 2)
                    return "isAdmin";
        });
        Gate::define('isEmployer',function($users_roles){
            $rqt =  DB::select('select * from users  where id = ?  and activiter=true limit 1',[Auth::id()]);
            if($rqt!=null)
                if( $rqt[0]->role_id == 3)
                    return "isEmployer";
        });
        Gate::define('isVisiteur',function($users_roles){
            $rqt =  DB::select('select * from users  where id = ?  and activiter=true limit 1',[Auth::id()]);
            if($rqt!=null)
                if( $rqt[0]->role_id == 4)
                    return "isVisiteur";
        });
    }
}
