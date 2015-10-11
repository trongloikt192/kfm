<?php

class SearchController extends \BaseController {
    
    public function index()
    {
        return View::make('f06');
    }

    public function search()
    {
    	$key_search = Input::get('key_search');
        $posts = Post::whereRaw("MATCH(title,content_vi) AGAINST(? IN BOOLEAN MODE)", [$key_search] )->paginate(5);

        return View::make('f06', compact('posts', 'key_search'));
    }

    public function searchAjax() 
    {
    	$key_search = Input::get('key_search');
        $posts = Post::whereRaw("MATCH(title,content_vi) AGAINST(? IN BOOLEAN MODE)", [$key_search] )->paginate(5);

        return Response::json($posts);
    }

}
