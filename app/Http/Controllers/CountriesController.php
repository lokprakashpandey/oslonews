<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Continent;
use App\Country;
use Validator;

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
		return view('countries.edit', compact('country','continents'));
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
		
		return redirect('countries/index')->with('message', 'Country Updated');
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
