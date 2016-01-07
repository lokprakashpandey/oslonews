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
	   $this->composeTopMenuDefault();// top menu for default main page
	   $this->composeTopHubMenu();//top menu for default(overall) hub wise
	   $this->composeTopmenu();//top menu for hub/country/
	   
	   $this->composeSidemenuDefault();
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
	

	private function composeTopMenuDefault() ///top menu for default overall
    {

		view()->composer('topmenudefault', function ($view) {

		   $hubs = \App\Hub::getHubs();//hub
		   
		   //get overall default categories

		   $categories = \App\Category::getTopMenuDefaultCategories();
				
		   $countries = \App\Country::getTopMenuDefaultCountries();
            
           $view->with(compact('categories','countries','hubs'));
        });
    }
	
	private function composeTopHubMenu() ///top menu for hub wise
    {

		view()->composer('topmenuhub', function ($view) {

		    $viewdata= $view->getData();
		   
		    $hub_slug = $viewdata['hub_slug'];
		   
		    $hubs = \App\Hub::getHubs();//hub
		   
		   //get hub wise categories
		   
		    $categories = \App\Category::getTopMenuHubCategories($hub_slug);//hub_id
		   				
		    $countries = \App\Country::getTopMenuHubCountries($hub_slug);//hub_id
            
            $view->with(compact('categories','countries','hubs'));
        });
    }
	
	private function composeTopmenu() ///top menu for hub/country/
    {
        view()->composer('topmenu', function ($view) {
			
		   $viewdata= $view->getData();
		   
		   $hub_slug = ($viewdata['hub_slug'])?$viewdata['hub_slug']:'international-edition';
		   $country_slug = $viewdata['country_slug'];


		   $hubs = \App\Hub::getHubs();//hub
		   
		   $categories = \App\Category::getTopMenuCategories($hub_slug,$country_slug);//hub,country

		   $countries = \App\Country::getTopMenuHubCountries($hub_slug);//hub
            
           $view->with(compact('categories','countries','hubs'));
        });
    }

	private function composeSidemenuDefault()//for hub wise only
    {
        view()->composer('sidemenudefault', function ($view) {

            $viewdata= $view->getData();
		   
		   $hub_slug = ($viewdata['hub_slug'])?$viewdata['hub_slug']:'international-edition';
		   
		   $hubs = \App\Hub::getHubs();//hub
		   
		    $categories = \App\Category::getSideMenuHubCategories($hub_slug);//hub_id
            
            $view->with(compact('categories'));
        });
    }
	
	private function composeSidemenu()//for hub/country  Continent/country/category
    {
        view()->composer('sidemenu', function ($view) {

            $viewdata= $view->getData();
		   
		   $hub_slug = ($viewdata['hub_slug'])?$viewdata['hub_slug']:'international-edition';
		   
		   $country_slug = $viewdata['country_slug'];
		   
		   $hubs = \App\Hub::getHubs();//hub
		   
		    $categories = \App\Category::getSideMenuCategories($hub_slug,$country_slug);//hub_id
            
            $view->with(compact('categories'));
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
