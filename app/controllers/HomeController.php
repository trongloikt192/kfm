<?php


class HomeController extends \BaseController {
    
    public function index()
    {
    	// Tin tuc & hoat dong moi nhat
        $news = Post::orderBy('updated_at', 'desc')->limit(10)->get();
        $news_len = count($news);

        // San pham & dich vu moi nhat
        $products = Post::where('category_id', '2')->orderBy('updated_at', 'desc')->limit(10)->get();
        $products_len = count($products);

        return View::make('f01', compact('news', 'products', 'news_len', 'products_len'));
    }

}
