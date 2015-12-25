<?php

namespace App\Providers;

use View;
use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{
 
	
	/**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
	   $this->composeTopMenuDefault();// top menu for default(overall) hub wise
	   $this->composeTopmenu();
	   $this->composeSidemenu();
	   $this->composePagemenu();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
	

	private function composeTopMenuDefault() ///top menu for default overall hub wise
    {

		view()->composer('topmenudefault', function ($view) {

		   $viewdata= $view->getData();
		   $hub_slug = ($viewdata['hub_slug'])?$viewdata['hub_slug']:'international-edition';
		   
		   $hubs = \App\Hub::getHubs();//hub
		   
		    $categories = \App\Category::getTopMenuHubCategories($hub_slug);//hub_id
			
			$countries = \App\Country::getMainMenuCountries($hub_slug);//hub_id
            
            $view->with(compact('categories','countries','hubs'));
        });
    }
	
	private function composeTopmenu() ///top menu can be Continent/country/category
    {
        view()->composer('topmenu', function ($view) {

		   $hubs = \App\Hub::getHubs();//hub
		   
		   $categories = \App\Category::getTopMenuCategories(2,4);//hub,country
			
			$countries = \App\Country::getMainMenuCountries(2);//hub
            
            $view->with(compact('categories','countries','hubs'));
        });
    }

	private function composeSidemenu()
    {
        view()->composer('sidemenu', function ($view) {

            $category = \App\Category::getTopCategoriesAll();
            
            $view->with(compact('category'));
        });
    }
	
	private function composePagemenu()
    {
        view()->composer('pages', function ($view) {

            $pages = \App\Page::getPages();
			
            $view->with(compact('pages'));
        });
    }
}
