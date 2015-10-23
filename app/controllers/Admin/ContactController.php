<?php
namespace Admin;

class ContactController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$contacts = \Contact::orderBy('status', 'asc')->get();
        return \View::make('admincp.b08', compact('contacts'));
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
	        $validator = \Validator::make($data, \Contact::$rules);
	        if ($validator->fails())
	        {
	            return \Response::json($validator->messages(), 500);
	        }
	        $contact = \Contact::create(['name'=>$data['name'], 'Contact'=>$data['Contact'], 'description'=>$data['description']]);
	        
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
        $contact = \Contact::find($id);
        return \Response::json($contact);
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
	        $validator = \Validator::make($data, \Contact::$rules);
	        if ($validator->fails())
	        {
	            return \Response::json($validator->messages(), 500);
	        }

			$id = $data['id'];
	        $contact = \Contact::findOrFail($id);
	        
	        $contact->update([
	        	'full_name'=>$data['full_name']
	        	, 'company'=>$data['company']
	        	, 'phone_number'=>$data['phone_number']
	        	, 'email'=>$data['email']
	        	, 'status'=>$data['status']
	        	, 'content'=>$data['content']
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
		\Contact::destroy($id);
		return 1;
	}

}