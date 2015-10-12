<?php

class FaqController extends \BaseController {
    
    public function show($slug)
    {
        $page = Page::where('slug', $slug)->get();

        $page = $page[0];

        return View::make('f07', compact('page'));
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


    public function about()
    {
        return View::make('pages.about');
    }


    public function faqs()
    {
        return View::make('pages.faqs');
    }


    public function terms()
    {
        return View::make('pages.terms');
    }


    public function privacy()
    {
        return View::make('pages.privacy');
    }
    
    
    public function pageBuilding()
    {
        return View::make('errors.building');
    }

}
