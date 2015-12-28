<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Hub;
use App\Category;
use App\Country;
use Validator;

class HubsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		//$hubs = Hub::get();
		$hubs = Hub::with(['categories'=> function($q){
							$q->where('parent_id',0);
							}
							
							])->orderBy('name')->get();
        return view('hubs.index',compact('hubs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $categories = Category::where('parent_id',0)->lists('name','id');
		 $countries = Country::lists('name','id');
		 return view('hubs.create', compact('categories','countries'));
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
            return redirect('builder')
                        ->withErrors($validator)
                        ->withInput();
        }
		
		$slug = str_slug($request['name']);

		$count = Hub::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
		
		$request['slug'] = $count ? "{$slug}-{$count}" : $slug;
		
		$hub = Hub::create([
			'name' => $request->name,
			'slug' => $request['slug'],
        ]);
		$hub->categories()->attach($request['category_id']);
		$hub->countries()->attach($request['country_id']);
		return redirect('hubs/index')->with('message', 'Hub Added');
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
        $hub = Hub::find($id);
		
		//category
		$categories = Category::where('parent_id',0)->lists('name','id');
		
		$categories_selected = $hub->categories->lists('id')->toArray();
		
		//country
		$countries = Country::lists('name','id');
		
		$countries_selected = $hub->countries->lists('id')->toArray();
		
		return view('hubs.edit', compact('hub',
												'categories',
												'categories_selected',
												'countries',
												'countries_selected'));
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
        $hub = Hub::findOrFail($id);
		
		if($hub['name'] != $request['name']){
			
			$slug = str_slug($request['name']);

			$count = Hub::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
		
			$request['slug'] = $count ? "{$slug}-{$count}" : $slug;
		}
		
		$hub->update($request->all());
		
		$hub->categories()->sync($request['category_id']);
		
		$hub->countries()->sync($request['country_id']);
		
		return redirect('hubs/index')->with('message', 'Hub Updated');
    }
	
	public function menu()
	{
		$hubs = Hub::with(['categories'=> function($q){
							$q->where('parent_id',0);
							}
							
							])->orderBy('name')->get();
		//dd($hubs->toArray());
        return view('hubs.menu',compact('hubs'));
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
