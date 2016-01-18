<?php

namespace App\Providers;

use View;
use Illuminate\Support\ServiceProvider;
use Route;

class RightContentServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
       $this->composeTopStoriesmenu();
	  // $this->composeColumnsmenu();
	   $this->composeLatestNews();
	   //$this->composeTwitterFeed();
	  // $this->composeColumnByAuthor();
	   //$this->composeRandomNews();
	   //$this->composeNewsSlideButtom();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
      
    }
	
	private function composeTopStoriesmenu()
    {
        view()->composer('top_stories', function ($view) {
			
			$viewdata= $view->getData();
		   
		    $hub_slug = (isset($viewdata['hub_slug']))?$viewdata['hub_slug']:Null;

            $top_stories = \App\News::topStories($hub_slug);
            
            $view->with(compact('top_stories'));
        });
    }
	/*
	private function composeColumnsmenu()
    {
        view()->composer('columns', function ($view) {

            $columns = \App\News::getColumns();
            
            $view->with(compact('columns'));
        });
    }
	*/
	private function composeLatestNews()
    {
        view()->composer('latest_news', function ($view) {

            $news = \App\News::getLatestNews();
            
            $view->with(compact('news'));
        });
    }
	/*
	private function composeTwitterFeed()
    {
        view()->composer('twitter_feed', function ($view) {

            $tweets = \App\News::twitter_feed();
            
            $view->with(compact('tweets'));
        });
    }
	private function composeNewsSlideButtom()
    {
        view()->composer('news_slide_buttom', function ($view) {

            $news = \App\News::getLatestNews();
            
            $view->with(compact('news'));
        });
    }
	private function composeColumnByAuthor()
	{
        view()->composer('columns_by_author', function ($view) {
			$currentRoute = Route::current();
			$params = $currentRoute->parameters();
		
            $columns = \App\News::getColumnsByAuthor($params);
            
            $view->with(compact('columns'));
        });
    }
	private function composeRandomNews()
	{
        view()->composer('random_news', function ($view) {
			
            $news = \App\News::getRandomNews();
            
            $view->with(compact('news'));
        });
    }*/

}
