<?php

class PagesController extends \BaseController {
    
    public function show($slug)
    {
        $page = Page::where('slug', $slug)->get();

        $page = $page[0];

        return View::make('f07', compact('page'));
    }





    public function saveFeedback()
    {
        $validator = Feedback::validate($data = Input::all());
        if ($validator->fails())
        {
            return Response::json(['valid'=> false, 'errors' => $validator->errors()]);
        }
        Feedback::create($data);
        return Response::json(['valid'=> true,'message' => Lang::get('larabase.feedback_submitted')]);
        Event::fire('feedback.submitted', [$data]);
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
