<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Hub;
use App\Category;
use App\Country;
use App\Helpers\CategoryHierarchy;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::get();
		return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CategoryHierarchy $hierarchy)
    {
        $categories = Category::get();
		
		$hierarchy->setupItems($categories);
		
		$category_opts = $hierarchy->render();
		
		$cat_types = array('1'=>'None','2'=>'column');
		
		$hubs = Hub::lists('name','id');
		
		$countries = Country::lists('name','id');
		
		return view('categories.create', compact('category_opts','cat_types','hubs','countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$current_position = Category::get()->max('position');
		
		$new_position = $current_position+1;
		
		$slug = str_slug($request['name']);

		$count = Category::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
		
		$request['slug'] = $count ? "{$slug}-{$count}" : $slug;
		
		$category = Category::create([
		   'name'		 => $request['name'],
		   'parent_id' 	 => $request['parent_id'],
		   'position'	 => $new_position,
		   'in_front'    => $request['in_front'],
		   'in_main_menu'=> $request['in_main_menu'],
		   'cat_type'	 => $request['cat_type'],
		   'slug'		 => $request['slug']
	   
	   ]);
		$category->hubs()->attach($request['hub_id']);
		$category->countries()->attach($request['country_id']);
		
		return redirect('categories/index')->with('message', 'Category Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
