<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Book;
use App\Models\User;
//use Illuminate\Auth\Access\Gate;
use App\Policies\BookPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Book::class=>BookPolicy::class

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();



        /*
        Gate::define('edit', function (User $user){
            return ($user->type=='admin');
        });

        Gate::define('delete', function (User $user){
            return ($user->type=='admin');
        });
        */

    }
}
