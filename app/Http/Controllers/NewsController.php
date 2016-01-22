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
use App\CategoryHub;
use App\Helpers\CategoryHierarchy;
use File;
use Intervention\Image\Facades\Image as Image;

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
									//check hub/country/sub category exits
									$check_sub_category = $country_hub->categories()->where('category_id',$child->id)->first();
					
									if($check_sub_category){
										 
										$sub_category_hub_id = CategoryHub::where('category_id',$child->id)
																		->where('hub_id',$hub->id)
																		->first();
																
									   		//category_country_hub_id/category_hub_id/category_id/hub_id
											$category_array[$check_sub_category->pivot->id.'_'.$sub_category_hub_id->id.'_'.$child->id.'_'.$hub->id] = $hub->name.' &raquo; '.$country->name.' &raquo; '.$category->name.' &raquo; '.$child->name;
						
									}	
								}
							}
							else
							{
								if($category->parent_id==0)//only if no parent 
								{
									$category_hub_id = CategoryHub::where('category_id',$category->id)
																		->where('hub_id',$hub->id)
																		->first();
									//category_country_hub_id/category_hub_id/categoryt_id/hub_id
									$category_array[$category->pivot->id.'_'.$category_hub_id->id.'_'.$category->id.'_'.$hub->id] = $hub->name.' &raquo; '.$country->name.' &raquo; '.$category->name;
								}	
							}
							//$category_array[$category->pivot->id] = $hub->name.' &raquo; '.$country->name.' &raquo; '.$category->name;
						}
						
				}
			
		}
		
				
		$news_types = Type::lists('name','id');
		
		$authors = AuthorProfile::lists('name','id');
		
		/*$get_categories = Category::getCategories();
		
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
		}*/
		
		return view('news.create', compact('category_array','news_types','authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach($request['category_country_hub_id'] as $hub_value)
		{
				$hub = explode('_',$hub_value);
			
			$hub_id[] = $hub[3];
			
			$category_id[] = $hub[2];
			
			$category_hub_id[] = $hub[1];

			$category_country_hub_id[] = $hub[0];
			
			
		}
		$this->validate($request, [
				'name'        => 'required',
				'content'     => 'required',
				'category_country_hub_id' => 'required',
				'type_id'	  => 'required',
				//'front_img'   => 'required|mimes:jpeg,gif,jpg,png',
			]);
			
		$slug = str_slug($request['name']);

		$count = News::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
		
		$request['slug'] = $count ? "{$slug}-{$count}" : $slug;
		
		//first image resize
		if( $request->hasFile('front_img') ){
			
			$imageName = str_random(15).'.'.$request->file('front_img')->getClientOriginalExtension();
		
			$destination_thumb = base_path() . '/images/news/thumb/'.$imageName;
			$destination_slide = base_path() . '/images/news/slides/'.$imageName;
			$destination_main = base_path() . '/images/news/'.$imageName;
		
			Image::make($request->file('front_img'))->resize(300, 250, function ($constraint) {
																	$constraint->aspectRatio();
																	$constraint->upsize();
																})->save($destination_thumb);
																
			Image::make($request->file('front_img'))->resizeCanvas(700, 400)->save($destination_slide);
			//Image::make($request->file('front_img_new'))->fit(700, 400)->save($destination_slide);
			
			
			Image::make($request->file('front_img'))->save($destination_main);
		}
		
		$news = News::create([
		   'name'				=> $request['name'],
		   'content'			=> $request['content'],
		   'front_img'			=> $imageName,
		   'user_id' 			=> 1,//Auth::user()->id,
		   'author_profile_id' 	=> $request['author_profile_id'],
		   'slug'				=> $request['slug'],
		   'publish'			=>1
	   
	   ]);
	   
	   $news->hubs()->sync($hub_id);
	   
       $news->categories()->sync($category_id);
		
	   $news->category_hubs()->sync($category_hub_id);
	   
	   $news->category_country_hubs()->sync($category_country_hub_id);

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
		
		$categories_selected = $news->category_country_hubs->lists('id')->toArray();//category_country_hub_id
		
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
							
						}
						
				}
			
		}
		
			
		$news_types = Type::lists('name','id');
		
		$news_types_selected = $news->types->lists('id')->toArray();
		
		$authors = AuthorProfile::lists('name','id');
		
		return view('news.edit', compact(
									'news',
									'category_array',
									'categories_selected',
									'authors',
									'news_types',
									'news_types_selected'
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
		
		$news->category_country_hubs()->sync($request['category_country_hub_id']);
		
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
