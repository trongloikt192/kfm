<?php
namespace Admin;

class SettingsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$setting = \Setting::first();
		$map = json_decode($setting->map_position);

		$staticmap_str = "https://maps.googleapis.com/maps/api/staticmap?sensor=false&zoom=15&size=450x410&maptype=roadmap&markers=color:red%7Clabel:KFM%7C:user_lat%2C:user_long";
    	$staticmap_src = str_replace(':user_lat', $map->latitude, $staticmap_str);
    	$staticmap_src = str_replace(':user_long', $map->longitude, $staticmap_src);

    	$slides = json_decode($setting->silde_images);

        return \View::make('admincp.b09', compact('setting', 'staticmap_src', 'map', 'staticmap_str', 'slides'));
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
	        $validator = \Validator::make($data, \Setting::$rules);
	        if ($validator->fails())
	        {
	            return \Response::json($validator->messages(), 500);
	        }
	        $link = \Setting::create(['name'=>$data['name'], 'link'=>$data['link'], 'description'=>$data['description']]);
	        
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
        $link = \Setting::find($id);
        return \Response::json($link);
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
	        $setting = \Setting::first();

	        $map_position = '{"latitude": "'.$data['latitude'].'", "longitude": "'.$data['longitude'].'"}';
	        
	        $setting->update([
	        	'company'=>$data['company']
	        	, 'map_position'=>$map_position
	        	, 'sologan'=>$data['sologan']
	        	, 'email'=>$data['email']
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
		\Setting::destroy($id);
		return 1;
	}


	public function uploadImage() 
	{
		try {
			// 1. UPLOAD FILE
        	// Directory where we're storing uploaded images
			// Remember to set correct permissions or it won't work
			$upload_dir = public_path('uploads/images/setting/');
			
			$uploader = new \FileUpload('image');
			
			// Handle the upload
			$result = $uploader->handleUpload($upload_dir);
			
			if (!$result) {
			  exit(\Response::json(array('success' => false, 'msg' => $uploader->getErrorMsg())));  
			}
			
			// 2. REMOVE OLD FILE & UPDATE DATABASE
			$id = \Input::get('id');
        	$setting = \Setting::first();

        	$slides = json_decode($setting->silde_images);

        	$slides->$id = $uploader->getFileName();
			$setting->silde_images = json_encode($slides);
            $setting->save();
			
			return \Response::json(array('success' => true, 'source' => $uploader->getFileName()));
			
		} catch (Exception $ex) {
			exit(\Response::json(array('success' => false, 'msg' => $ex->getMessage())));  
		}
	}

}