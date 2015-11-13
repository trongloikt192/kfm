<?php


class HomeController extends \BaseController {
    
    public function index()
    {
    	// Tin tuc & hoat dong moi nhat
    	$news_catID = '2';
        $news = Post::where(['category_id'=>$news_catID, 'status'=>'1'])
                ->orderBy('updated_at', 'desc')
                ->limit(10)->get();
        $news_len = count($news);

        // San pham & dich vu moi nhat
        $products_catID = '';
        $products = Post::where(['category_id'=>$products_catID, 'status'=>'1'])
                    ->orderBy('updated_at', 'desc')
                    ->limit(10)->get();
        $products_len = count($products);

        return View::make('f01', compact('news', 'products', 'news_len', 'products_len'));
    }

}
