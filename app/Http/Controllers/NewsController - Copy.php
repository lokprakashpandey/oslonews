<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\News;
use App\Type;
use App\Hub;
use App\Category;
use App\Country;
use App\AuthorProfile;
use App\CountryHub;
use App\Helpers\CategoryHierarchy;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::get();
		
		return view('news.index', compact('news'));
		
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$hubs = Hub::lists('name','id');
		
		$hubs = Hub::get();
		
		$category_array = array();
		
		foreach($hubs as $hub)
		{
			
				
				foreach($hub->countries as $country)
				{

						$country_hub_id = CountryHub::where('hub_id',$hub->id)
													->where('country_id',$country->id)
													->first();
						$country_hub = CountryHub::find($country_hub_id->id);

						$categories = $country_hub->categories()->get();

						foreach($categories as $category){

							if($category->children->count())
							{
					
								foreach($category->children as $child)
								{
									$check_sub_category = $country_hub->categories()->where('category_id',$child->id)->first();
					
									if($check_sub_category){
										//dd($check_sub_category->toArray());
										$category_array[$check_sub_category->pivot->id] = $hub->name.' &raquo; '.$country->name.' &raquo; '.$category->name.' &raquo; '.$child->name;
									}	
								}
							}
							else
							{
								if($category->parent_id==0)//only if no parent 
								{
									$category_array[$category->pivot->id] = $hub->name.' &raquo; '.$country->name.' &raquo; '.$category->name;
								}	
							}
							//$category_array[$category->pivot->id] = $hub->name.' &raquo; '.$country->name.' &raquo; '.$category->name;
						}
						
				}
			
		}
		
		$countries = Country::lists('name','id');
		
		$news_types = Type::lists('name','id');
		
		$authors = AuthorProfile::lists('name','id');
		
		$get_categories = Category::getCategories();
		
		$categories = array();
		
		foreach($get_categories as $cat)
		{
			
			if($cat->children->count())
			{
					
				foreach($cat->children as $child)
				{
						$categories[$child->id] = $cat->name.' &raquo; '.$child->name;
				}
			}
			else
			{
				$categories[$cat->id]=$cat->name;
			}
		}
		return view('news.create', compact('category_array','countries','categories','news_types','authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
				'name'        => 'required|max:100',
				'content'     => 'required',
				'category_country_hub_id' => 'required',
				'type_id'	  => 'required',
				//'front_img'   => 'required|mimes:jpeg,gif,jpg,png',
			]);
			
		$slug = str_slug($request['name']);

		$count = News::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
		
		$request['slug'] = $count ? "{$slug}-{$count}" : $slug;
		
		$news = News::create([
		   'name'				=> $request['name'],
		   'content'			=> $request['content'],
		   'front_img'			=> 'test',//$imageName,
		   'user_id' 			=> 1,//Auth::user()->id,
		   'author_profile_id' 	=> $request['author_profile_id'],
		   'slug'				=> $request['slug'],
		   'publish'			=>1
	   
	   ]);
	   
	   $news->category_country_hubs()->attach($request['category_country_hub_id']);

	   $news->types()->attach($request['type_id']);
	   
	   return redirect('news/index')->with('message', 'News Added');
	 
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
        $news = News::find($id);
		
		$get_categories = Category::getCategories();
		
		$categories = array();
		
		foreach($get_categories as $cat)
		{
			
			if($cat->children->count())
			{
					
				foreach($cat->children as $child)
				{
						$categories[$child->id] = $cat->name.' &raquo; '.$child->name;
				}
			}
			else
			{
				$categories[$cat->id]=$cat->name;
			}
		}
		
		$categories_selected = $news->categories->lists('id')->toArray();
		
		$hubs = Hub::lists('name','id');
		
		$hubs_selected = $news->hubs->lists('id')->toArray();
		
		$countries = Country::lists('name','id');
		
		$countries_selected = $news->countries->lists('id')->toArray();
		
		$news_types = Type::lists('name','id');
		
		$news_types_selected = $news->types->lists('id')->toArray();
		
		$authors = AuthorProfile::lists('name','id');
		
		return view('news.edit', compact(
									'news',
									'categories',
									'categories_selected',
									'authors',
									'news_types',
									'news_types_selected',
									'hubs',
									'hubs_selected',
									'countries',
									'countries_selected'
									));
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
        $news = News::findOrFail($id);
		
		if($news['name'] != $request['name']){
			
			$slug = str_slug($request['name']);

			$count = News::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
		
			$request['slug'] = $count ? "{$slug}-{$count}" : $slug;
		}
		
		$news->update($request->all());
		
		$news->hubs()->sync($request['hub_id']);
	    $news->countries()->sync($request['country_id']);
	    $news->categories()->sync($request['category_id']);
	    $news->types()->sync($request['type_id']);
 
		return redirect('news/index')->with('message', 'News Updated');
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
