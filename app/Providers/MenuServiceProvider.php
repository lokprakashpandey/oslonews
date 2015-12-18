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
	
	private function composeTopmenu() ///top menu can be Continent/country/category
    {
        view()->composer('topmenu', function ($view) {

            $categories = \App\Category::getTopMenuCategories();
			
			$countries = \App\Country::getMainMenuCountries();
            
            $view->with(compact('categories','countries'));
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
