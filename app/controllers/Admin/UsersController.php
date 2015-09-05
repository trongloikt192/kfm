<?php
namespace Admin;

class UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$users = \User::all();
        return \View::make('admincp.b03', compact('users'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = \Input::all();

		if(\Request::ajax()) {
	        $validator = \Validator::make($data, \User::$signup_rules);
	        if ($validator->fails())
	        {
	            return \Response::json($validator->messages(), 500);
	        }
	        $user = \User::create([
	        	'username'=>$data['username']
	        	, 'password'=>\Hash::make($data['password'])
	        	, 'email'=>$data['email']
	        	, 'first_name'=>$data['first_name']
	        	, 'last_name'=>$data['last_name']
	        	, 'address'=>$data['address']
	        	, 'phone_number'=>$data['phone_number']
	        ]);
	        
	        return 1;
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
		
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$id = \Input::get('id');
        $user = \User::find($id);
        return \Response::json($user);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$data = \Input::all();

		if(\Request::ajax()) {
	        $validator = \Validator::make($data, \User::$update_rules);
	        if ($validator->fails())
	        {
	            return \Response::json($validator->messages(), 500);
	        }

			$id = $data['id'];
	        $user = \User::findOrFail($id);
	        
	        $user->update([
	        	'username'=>$data['username']
	        	, 'email'=>$data['email']
	        	, 'first_name'=>$data['first_name']
	        	, 'last_name'=>$data['last_name']
	        	, 'address'=>$data['address']
	        	, 'phone_number'=>$data['phone_number']
	        ]);

	        return 1;
	    }
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$id = \Input::get('id');
		\User::destroy($id);
		return 1;
	}

}