<?php

class ContactController extends \BaseController {
    
    public function index()
    {
    	$staticmap_src = "https://maps.googleapis.com/maps/api/staticmap?sensor=false&zoom=17&size=504x500&maptype=roadmap&markers=color:red%7Clabel:KFM%7C:user_lat%2C:user_long";

    	$setting = Setting::first();

    	$map = json_decode($setting->map_position);

    	$staticmap_src = str_replace(':user_lat', $map->latitude, $staticmap_src);
    	$staticmap_src = str_replace(':user_long', $map->longitude, $staticmap_src);

        return View::make('f05', compact('staticmap_src', 'map'));
    }


    /**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Input::all();

		if(Request::ajax()) {
	        $validator = Validator::make($data, Contact::$rules);
	        if ($validator->fails())
	        {
	            return Response::json($validator->messages(), 500);
	        }
	        
	        Contact::create([
	        	'full_name'=>$data['full_name']
	        	, 'company'=>$data['company']
	        	, 'email'=>$data['email']
	        	, 'phone_number'=>$data['phone_number']
	        	, 'content'=>$data['content']
	        ]);
	        
	        return 1;
	    }
	}
}
