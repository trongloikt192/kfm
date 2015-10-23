<?php
namespace Admin;

class CategoriesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$parent_id = '0';
		$categories = \Category::select('id', 'name')->where('parent_id', $parent_id)->with('children')->get();
        
        return \View::make('admincp.b04', compact('categories'));
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
	        $validator = \Validator::make($data, \Category::$rules);
	        if ($validator->fails())
	        {
	            return \Response::json($validator->messages(), 500);
	        }
	        $category = \Category::create(['name'=>$data['name'], 'url'=>$data['url'], 'parent_id'=>$data['parent_id']]);
	        
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
        $category = \Category::find($id);
        return \Response::json($category);
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
	        $validator = \Validator::make($data, \Category::$rules);
	        if ($validator->fails())
	        {
	            return \Response::json($validator->messages(), 500);
	        }

			$id = $data['id'];
	        $category = \Category::findOrFail($id);
	        
	        $category->update(['name'=>$data['name'], 'parent_id'=>$data['parent_id'], 'url'=>$data['url']]);
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
		\Category::destroy($id);
		$affectRows = \Category::where('parent_id', $id)->with('children')->delete();
		return ++$affectRows;
	}

}