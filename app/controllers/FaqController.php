<?php

class FaqController extends \BaseController {
    
    public function index()
    {
        $faqs = Faq::all();

        return View::make('f10', compact('faqs'));
    }


    public function show($id)
    {
        $faq = Faq::find($id);

        return View::make('f09', compact('faq'));
    }

    public function askQuestion()
    {
        return View::make('f08');
    }
    
    
    public function sendQuestion() {
        $data = \Input::all();

		if(\Request::ajax()) {
	        $validator = \Validator::make($data, \Faq::$rules);
	        if ($validator->fails())
	        {
	            return \Response::json($validator->messages(), 500);
	        }
	        
	        $faq = \Faq::create([
	            'title'=>$data['title']
	            , 'full_name'=>$data['full_name']
	            , 'address'=>$data['address']
	            , 'company'=>$data['company']
	            , 'competence'=>$data['competence']
	            , 'email'=>$data['email']
	            , 'content'=>$data['content']
	        ]);
	        
	        return 1;
	    }
    }


}
