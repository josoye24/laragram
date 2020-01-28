<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Profile;

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
        Schema::defaultStringLength(191);
    
        view()->composer("layouts.navbars.navs.auth", function($view) {

            $user = Profile::userProfile();
            $view->with(compact("user"));       

        });
        

        view()->composer("layouts.navbars.sidebar", function($view) {

            $user = Profile::userProfile();
            $postCount = Profile::postCount();
            $followerCount  = Profile::followerCount ();
            $followingCount = Profile::followingCount();

            $view->with(compact("user", "postCount", "followerCount", "followingCount"));       

        });
    
    
    }
}
