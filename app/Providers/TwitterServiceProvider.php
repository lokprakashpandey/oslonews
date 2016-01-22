<?php

namespace App\Providers;

use View;
use Illuminate\Support\ServiceProvider;
use Route;

class TwitterServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
	   $this->composeTwitterFeed();

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
      
    }
	
	private function composeTwitterFeed()
    {
        view()->composer('twitter_feed', function ($view) {

            $tweets = \App\News::twitter_feed();
            
            $view->with(compact('tweets'));
        });
    }

}
