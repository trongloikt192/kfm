<?php
namespace Admin;

class CustomersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$customers = \Customer::all();
        return \View::make('admincp.b06', compact('customers'));
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
	        $validator = \Validator::make($data, \Customer::$rules);
	        if ($validator->fails())
	        {
	            return \Response::json($validator->messages(), 500);
	        }
	        $customer = \Customer::create([
	        	'name'=>$data['name']
	        	, 'business_scope'=>$data['business_scope']
	        	, 'delegate'=>$data['delegate']
	        	, 'address'=>$data['address']
	        	, 'email'=>$data['email']
	        	, 'phone_number'=>$data['phone_number']
	        	, 'domain'=>$data['domain']
	        	, 'logo'=>$data['logo']
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
        $customer = \Customer::find($id);
        return \Response::json($customer);
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
	        $validator = \Validator::make($data, \Customer::$rules);
	        if ($validator->fails())
	        {
	            return \Response::json($validator->messages(), 500);
	        }

			$id = $data['id'];
	        $customer = \Customer::findOrFail($id);
	        
	        $customer->update([
	        	'name'=>$data['name']
	        	, 'business_scope'=>$data['business_scope']
	        	, 'delegate'=>$data['delegate']
	        	, 'address'=>$data['address']
	        	, 'email'=>$data['email']
	        	, 'phone_number'=>$data['phone_number']
	        	, 'domain'=>$data['domain']
	        	, 'logo'=>$data['logo']
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
		\Customer::destroy($id);
		return 1;
	}

}