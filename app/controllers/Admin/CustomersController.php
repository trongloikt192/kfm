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
	        	// , 'logo'=>$data['logo']
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
	        	// , 'logo'=>$data['logo']
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
	
	
	public function uploadImage() {
		try {
			// 1. UPLOAD FILE
        	// Directory where we're storing uploaded images
			// Remember to set correct permissions or it won't work
			$upload_dir = public_path('uploads/images/customer/');
			
			$uploader = new \FileUpload('image');
			
			// Handle the upload
			$result = $uploader->handleUpload($upload_dir);
			
			if (!$result) {
			  exit(\Response::json(array('success' => false, 'msg' => $uploader->getErrorMsg())));  
			}
			
			// 2. REMOVE OLD FILE & UPDATE DATABASE
			$id = \Input::get('id');
        	$customer = \Customer::findOrFail($id);
			if($customer->logo) {
                $oldFile = $upload_dir . $customer->logo;
                \File::delete($oldFile);
            }
			$customer->logo = $uploader->getFileName();
            $customer->save();
			
			return \Response::json(array('success' => true, 'source' => $uploader->getFileName()));
			
		} catch (Exception $ex) {
			exit(\Response::json(array('success' => false, 'msg' => $ex->getMessage())));  
		}
	}
}