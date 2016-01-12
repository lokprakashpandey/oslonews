<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Continent;
use App\Country;
use App\Hub;
use App\Category;             
use App\CountryHub;
use Validator;
use Redirect;

class CountriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::orderBy('name')->get();
        return view('countries.index',compact('countries'));
    }
                                                                                                                                                                                                                                
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $continents = Continent::orderBy('name')->lists('name','id');
		//$hubs = Hub::lists('name','id');
		return view('countries.create',compact('continents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            return redirect('countries/create')
                        ->withErrors($validator)
                        ->withInput();
        }
		
		$slug = str_slug($request['name']);

		$count = Country::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
		
		$request['slug'] = $count ? "{$slug}-{$count}" : $slug;
		
		$country = Country::create([
			'name' => $request->name,
			'slug' => $request['slug'],
			'continent_id' => $request['continent_id'],
			'cnt_in_main_menu'=> $request['in_main_menu'],
        ]);
		//$country->hubs()->attach($request['hub_id']);
		return redirect('countries/index')->with('message', 'Country Added');
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
        $country = Country::find($id);
		$continents = Continent::orderBy('name')->lists('name','id');
		
		//hubs
		/*$hubs = Hub::lists('name','id');
		
		$hubs_selected = $country->hubs->lists('id')->toArray();
		*/
		return view('countries.edit', compact('country',
    
											   'continents'));
												
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
         $country = Country::findOrFail($id);
		
		if($country['name'] != $request['name']){
			
			$slug = str_slug($request['name']);

			$count = Country::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
		
			$request['slug'] = $count ? "{$slug}-{$count}" : $slug;
		}
		
		$country->update($request->all());
		
		$country->hubs()->sync($request['hub_id']);
		
		return redirect('countries/index')->with('message', 'Country Updated');
    }
	public function country_in_main_menu(Request $request)
	{
		$country = Country::find($request['country_id']);
	
		$country->hubs()->sync([$request['hub_id']=>['cnt_in_main_menu'=>$request['cnt_in_main_menu'],
											'cnt_in_front'=>$request['cnt_in_front']]],false);
		//return redirect('hubs/menu')->with('message', 'Category Updated');
		
	}
	
	public function cnt_category_in_main_menu(Request $request)
	{
		$country_hub = CountryHub::find($request['country_hub_id']);
	
		$country_hub->categories()->sync([$request['category_id']=>['cnt_cat_in_main_menu'=>$request['cnt_cat_in_main_menu'],
											'cnt_cat_in_front'=>$request['cnt_cat_in_front']]],false);
	
		
	}
	public function hub_country_category($hub_id,$country_id)
	{
		$country_hub_id = CountryHub::where('hub_id',$hub_id)
								  ->where('country_id',$country_id)
								  ->first();
	
		$country_hub = CountryHub::find($country_hub_id->id);
		
		$hub = Hub::find($hub_id);
		
		$country = Country::find($country_id);
		
			
		//$get_categories = Category::getCategories(); //for all categories
		
		$get_categories = $hub->categories()->where('parent_id',0)->get(); //** for those categories which is already in that HUB
		
		$categories = array();
		
		foreach($get_categories as $cat)
		{
			$categories[$cat->id]=$cat->name;
			
			if($cat->children_category_hub($hub_id)->count()) //for those categories that is already in that hub
			//if($cat->children->count())
			{
					
				foreach($cat->children_category_hub($hub_id) as $child)
				{
						$categories[$child->id] = $cat->name.' &raquo; '.$child->name;
				}
			}
			
				

		}
		
		$categories_selected = $country_hub->categories()->get();
		
		//dd($categories_selected->toArray());
			
		$categories_selected_ids = $country_hub->categories->lists('id')->toArray();
		
		return view('countries.hub_country_category',compact('country_hub',
															 'categories',
															 'categories_selected',
															 'categories_selected_ids',
															 'hub',
															 'country'));
	}
	
	public function hub_country_category_update(Request $request, $id)
	{
		$country_hub = CountryHub::find($id);
		
		$country_hub->categories()->sync($request['category_id']);
		
		//return redirect('countries/index')->with('message', 'Updated');
		return Redirect::back()->with('message','Updated');
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
