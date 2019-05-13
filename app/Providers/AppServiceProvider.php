<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
	    Blade::if('role', function ($role_id_or_name) {
	    	$user = auth()->user();
		    return $user && $user->hasRole($role_id_or_name);
	    });
    }
}
