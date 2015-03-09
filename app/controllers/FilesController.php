<?php

class FilesController extends \BaseController {

	/**
	 * Returns the particular view to the browser.
	 * GET /upload
	 *
	 * @return View upload
	 */
	public function upload()
	{
		return View::make('files.upload');
	}
	
	/**
	 * Validates and uploads CSV files, returns the particular view to the browser.
	 *
	 * @return View log
	 */
	public function handleUpload()
	{		
		if (Input::hasFile('fileToProcess')) {
			//Start time of the upload process
			$startTime = microtime(true);
			
            $fileToProcess = Input::file('fileToProcess');
            
			//Excel and CSV files management PHPExcel library for Laravel 
			$results = Excel::load($fileToProcess)->get();
			
			$rules = [
						'last_name' => 'required|string|min:5|max:33',
						'first_name' => 'required|string|min:5|max:33',
						'gender' => 'required|string|max:2',
						'birthdate' =>'required|date',
						'phone_number' => 'required|string|regex:/[0-9]{10,11}/',
						'email' => 'required|string|min:5',
			];
					
			//To keep row index in case of validation failure
			$rowIndex = 0;
			
			foreach ($results as $result) {
				
				$rowIndex = $rowIndex + 1;
				
				//Loads row data
				$row = [
					'last_name' => $result->last_name,
					'first_name' => $result->first_name,
					'gender' => $result->gender,
					'birthdate' => $result->birthdate,
					'phone_number' => $result->phone_number,
					'email' => $result->email,
				];	
					
				$validator = Validator::make($row, $rules);
					
				if($validator->fails()){
					// Adds row index to better inform the user
					$validator->getMessageBag()->add('rowIndex', 'Row Number: ' .$rowIndex. '.');						
					return Redirect::route('upload')->withErrors($validator)->withInput();
					break;						
				} else {
					// Creates ORM objects from row data
					$contact = new Contact;
					
					$contact->user_id = Auth::id();
					$contact->last_name = $result->last_name;
					$contact->first_name = $result->first_name;
					$contact->gender = $result->gender;
					$contact->birthdate = date('Y-m-d H:i:s', strtotime($result->birthdate));
						
					// Persist the object to the DB
					$contact->save();
						
					// Creates ORM objects from row data
					$phoneNumber = new PhoneNumber;
					$phoneNumber->phone_number = $result->phone_number;
					$contact->phoneNumbers()->save($phoneNumber);
						
					// Creates ORM objects from row data
					$email = new Email;
					$email->email = $result->email;					
					$contact->emails()->save($email);
				}					
            }
			
			// Calculates time spent uploading data
			$endTime = microtime(true);
			$timeDiff = $endTime - $startTime;
			
			// Creates ORM objects from log data
			$userLog = new UserLog;		
			$userLog->user_id = Auth::id();
			$userLog->upload_time = $timeDiff;
			// Only flawless files are uploaded
			$userLog->error_count = 0;
			$userLog->upload_date = date('Y-m-d H:i:s');
			
			// Persist the object to the DB
			$userLog->save();
			
			// Flashes feedback info to the HTTP session
			Session::flash('message', 'Upload was successful!'); 
			Session::flash('upload_time', 'Upload Time (in seconds): ' .$userLog->upload_time. '.'); 			
			Session::flash('error_count', 'Error Count: ' .$userLog->error_count. '.');
			Session::flash('upload_date', 'Upload Date: ' . $userLog->upload_date. '.');
			
			return Redirect::route('log');			
        }
		// Uploading unsuccessful, returns login view.
        return Redirect::route('upload');
	}
	
	/**
	 * Returns the particular view to the browser.
	 * GET /log
	 *
	 * @return View log
	 */
	public function log()
	{
		return View::make('files.log');
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
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /users
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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