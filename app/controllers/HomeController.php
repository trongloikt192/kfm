<?php


class HomeController extends \BaseController {
    
    public function index()
    {
        $news = Post::limit(10)->orderBy('updated_at', 'desc')->get();
        return View::make('f01', compact('news'));
    }

}
