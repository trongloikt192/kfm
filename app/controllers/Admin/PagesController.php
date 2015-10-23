<?php

namespace Admin;

class PagesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$pages = \Page::get();
		$categories = \Category::where('parent_id', '0')->with('children')->get();
		
		return \View::make('admincp.b12', compact('pages', 'categories'));
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
	        $validator = \Validator::make($data, \Page::$rules);
	        if ($validator->fails())
	        {
	            return \Response::json($validator->messages(), 500);
	        }

	        $slug = $data['slug'];
	        if(empty($slug)) {
		    	$slug = $data['title'];
		    }
		    $slug = genarate_slug( $slug );

	        $page = \Page::create([
	        	'title'=>$data['title']
	        	, 'slug'=>$slug
	        	, 'content'=>$data['content']
	        	, 'category_id'=>$data['category_id']
	        ]);
	        
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
		//
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
        $page = \Page::find($id);
        return \Response::json($page);
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
			
			// 1. CHECK VALIDATE
	        $validator = \Validator::make($data, \Page::$rules);
	        if ($validator->fails())
	        {
	            return \Response::json($validator->messages(), 500);
	        }
	
			// MAKE SLUG
	        $slug = $data['slug'];
	        if(empty($slug)) {
		    	$slug = $data['title'];
		    }
		    $slug = genarate_slug( $slug );
			
			// 2. UPDATE
			$id = $data['id'];
	        $page = \Page::findOrFail($id);
	        $page->update([
	        	'title'=>$data['title']
	        	, 'slug'=>$slug
	        	, 'content'=>$data['content']
	        	, 'category_id'=>$data['category_id']
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
		\Page::destroy($id);
		return 1;
	}


	
}
