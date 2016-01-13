<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Bican\Roles\Models\Role;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    
	public function __construct()
	{
		$this->middleware('role:admin', ['except' => ['login','login_check','register','userLogin']]);
	}
	/**
     * Display a listing of the resource.
     *
     * @return Response
     */
	protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }
    public function index()
    {
		$users = User::paginate(20);
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
		$roles = Role::lists('name','id');
        return view('auth.register',compact('roles'));
    }
	
	 public function register() // for general user
    {
        return view('auth.user_register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
       
	   $validator = $this->validator($request->all());

       if ($validator->fails()) {
           $this->throwValidationException(
               $request, $validator
           );
       }


	  $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
			'phone' => $request->phone,
			'address' => $request->address,
            'password' => bcrypt($request->password),
			'active'  =>1
        ]);
		
	
		$user->attachRole($request->role_id);
	
       return redirect('users/index');
    }

	public function login()
	{
		
		return view('auth.login');
		
	}
	
	public function userLogin()//for general user
	{
		
		return view('auth.user_login');
		
	}
	

	public function login_check(Request $request)
	{
		if (Auth::attempt([ 'email' => $request['email'], 'password' => $request['password'], 'active' => 1 ])) {
           
		   if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('author') || Auth::user()->hasRole('editor')) { 
            return redirect()->intended('news/index');
		   }
		   if (Auth::user()->hasRole('user')) { 
            return redirect()->intended('/');
		   }
		   
        }
		else
		{
		    $errors = 'Email and/or password invalid.'; // if Auth::attempt fails (wrong credentials) create a new message bag instance.
			return redirect('admin')->withErrors($errors);
		}
		

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
        //
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
        //
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
