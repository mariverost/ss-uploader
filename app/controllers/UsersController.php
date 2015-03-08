<?php

class UsersController extends \BaseController {

	/**
	 * Returns the particular view to the browser.
	 * GET /login
	 *
	 * @return View login
	 */
	public function login()
	{
		return View::make('users.login');
	}
	
	/**
	 * If authentication successful, returns the particular view to the browser.
	 *
	 * @return View upload
	 */
	public function handleLogin()
	{
		$data = Input::only(['email', 'password']);
		
		// Validates input data
		$validator = Validator::make($data, ['email' => 'required|email|min:8', 'password' => 'required',]);

        if($validator->fails()){
            return Redirect::route('login')->withErrors($validator)->withInput();
        }
		
		// If authentication successful, returns upload view.
        if(Auth::attempt(['email' => $data['email'], 'password' => $data['password']])){
            return Redirect::to('upload');
        }
		
		// Authentication unsuccessful, returns login view.
        return Redirect::to('login');
	}
	
	/**
	 * Returns the particular view to the browser.
	 * GET /profile
	 *
	 * @return View profile
	 */
	public function profile()
	{
		return View::make('users.profile');
	}
	
	/**
	 * If authenticated, returns login view to the browser.
	 *
	 * @return View upload
	 */
	public function logout()
	{
		if(Auth::check()){
			Auth::logout();
		}
		
		return Redirect::route('login');
	}

	/**
	 * Display a listing of the resource.
	 * GET /users
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /users/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create');
	}

	/**
	 * Stores a newly created user in DB storage.
	 * POST /users
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Input::only(['first_name','last_name','email','password', 'password_confirmation']);

		$validator = Validator::make($data, 
			[
                'first_name' => 'required|min:5|max:32',
                'last_name' => 'required|min:5|max:32',
                'email' => 'required|email|min:5',
                'password' => 'required|min:5|confirmed',
                'password_confirmation'=> 'required|min:5'
            ]
        );

		// Validates input data
		if($validator->fails()){
            return Redirect::route('user.create')->withErrors($validator)->withInput();
        }

		// Applies a hash to the password
		$data['password'] = Hash::make($data['password']);
		
        $newUser = User::create($data);
        
		// If creation successful, logs the new user and displays upload form 
		if($newUser){
            Auth::login($newUser);
            return Redirect::route('upload');
        }

        return Redirect::route('login')->withInput();
	}

	/**
	 * Display the specified resource.
	 * GET /users/{id}
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
	 * GET /users/{id}/edit
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
	 * PUT /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}