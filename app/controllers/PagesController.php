<?php

class PagesController extends \BaseController {

	public function home(){
		return View::make('f01');
	}

    public function f02() {
        return View::make('f02');
    }

    public function f03() {
        return View::make('f03');
    }

    public function f04() {
        return View::make('f04');
    }

    public function f05() {
        return View::make('f05');
    }

    public function f06() {
        return View::make('f06');
    }


    public function getFeedback()
    {
        return View::make('pages.feedback');
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

}
