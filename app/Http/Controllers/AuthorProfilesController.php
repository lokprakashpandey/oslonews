<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AuthorProfile;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use File;

use Intervention\Image\Facades\Image as Image;

class AuthorProfilesController extends Controller
{
    
	public function __construct()
	{
		//$this->middleware('role:admin');
	}
	/**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
       $authors = AuthorProfile::paginate(20);
        return view('author_profiles.index',compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
       return view('author_profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        
		if( $request->hasFile('img') ){
			
			$imageName = str_random(15).'.'.$request->file('img')->getClientOriginalExtension();
						
			$destination = base_path() . '/images/profiles/'.$imageName;
			
			Image::make($request->file('img'))->resize(65, null, function ($constraint) {
																	$constraint->aspectRatio();
																	$constraint->upsize();
																})->save($destination);
	   }

		$author_profile = AuthorProfile::create([
		   'name'			=> $request['name'],
		   'address'		=> $request['address'],
		   'phone'			=> $request['phone'],
		   //'img'			=> $imageName,
		   'email'			=> $request['email'],
		   'twitter'		=> $request['twitter'],
		   'description'	=> $request['description'],
		   'user_id' 		=> 1 //Auth::user()->id
	   
	   ]);
	   return redirect('author_profiles/index')->with('message', 'Author Profile Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //$author = AuthorProfile::where('user_id',Auth::user()->id)->find($id); //find by id
		 $author = AuthorProfile::where('user_id',1)->find($id); //find by id
		 return view('author_profiles.edit',compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
	
       //$author = AuthorProfile::where('user_id',Auth::user()->id)->findOrFail($id);
	   $author = AuthorProfile::where('user_id',1)->findOrFail($id);
	   
	   if( $request->hasFile('img_new') ){
			$imageName = str_random(15).'.'.$request->file('img_new')->getClientOriginalExtension();
			File::delete(base_path() . '/images/profiles/'.$author->img);
			
			$destination = base_path() . '/images/profiles/'.$imageName;
			
			Image::make($request->file('img_new'))->resize(65, null, function ($constraint) {
																	$constraint->aspectRatio();
																	$constraint->upsize();
																})->save($destination);
		   $request['img'] = $imageName;
	   }
	   $author->update($request->all());
	   return redirect('author_profiles/index')->with('message', 'Author Profile Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
