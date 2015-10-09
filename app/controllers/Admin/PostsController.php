<?php
namespace Admin;


class PostsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$posts = \Post::all();
		$categories = \Category::all()->lists('name', 'id');
        return \View::make('admincp.b05', compact('posts','categories'));
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
	        $validator = \Validator::make($data, \Post::$rules);
	        if ($validator->fails())
	        {
	            return \Response::json($validator->messages(), 500);
	        }
	        
	        $post = \Post::create([
	        	'title'=>$data['title']
	        	, 'slug'=>$data['slug']
	        	, 'description'=>$data['description']
	        	, 'content_vi'=>$data['content_vi']
	        	, 'content_en'=>$data['content_en']
	        	, 'image'=>$data['image']
	        	, 'status'=>$data['status']
	        	, 'category_id'=>$data['category_id']
	        	// , 'user_id'=>$data['user_id']
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
        $post = \Post::find($id);
        return \Response::json($post);
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
	        $validator = \Validator::make($data, \Post::$rules);
	        if ($validator->fails())
	        {
	            return \Response::json($validator->messages(), 500);
	        }
	        
	        $id = $data['id'];
	        $post = \Post::findOrFail($id);
			
			// 2. UPDATE
	        $post->update([
	        	'title'=>$data['title']
	        	, 'slug'=>$data['slug']
	        	, 'description'=>$data['description']
	        	, 'content_vi'=>$data['content_vi']
	        	, 'content_en'=>$data['content_en']
	        	// , 'image'=>$data['image']
	        	, 'status'=>$data['status']
	        	, 'category_id'=>$data['category_id']
	        	// , 'user_id'=>$data['user_id']
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
		\Post::destroy($id);
		return 1;
	}
	
	
	public function uploadImage() {
		try {
			// 1. UPLOAD FILE
        	// Directory where we're storing uploaded images
			// Remember to set correct permissions or it won't work
			$upload_dir = public_path('uploads/post_images/');
			
			$uploader = new \FileUpload('image');
			
			// Handle the upload
			$result = $uploader->handleUpload($upload_dir);
			
			if (!$result) {
			  exit(\Response::json(array('success' => false, 'msg' => $uploader->getErrorMsg())));  
			}
			
			// 2. REMOVE OLD FILE & UPDATE DATABASE
			$id = \Input::get('id');
        	$post = \Post::findOrFail($id);
			if($post->image) {
                $oldFile = $upload_dir . $post->image;
                \File::delete($oldFile);
            }
			$post->image = $uploader->getFileName();
            $post->save();
			
			return \Response::json(array('success' => true, 'source' => $uploader->getFileName()));
			
		} catch (Exception $ex) {
			exit(\Response::json(array('success' => false, 'msg' => $ex->getMessage())));  
		}
	}
	
	
	public function uploadFile() {
		try {
			// 1. UPLOAD FILE
        	// Directory where we're storing uploaded images
			// Remember to set correct permissions or it won't work
			$upload_dir = public_path('uploads/post_files/');
			
			$uploader = new \FileUpload('fileAttachs');
			
			// Handle the upload
			$result = $uploader->handleUpload($upload_dir);
			
			if (!$result) {
			  exit(\Response::json(array('success' => false, 'msg' => $uploader->getErrorMsg())));  
			}
			
			// // 2. REMOVE OLD FILE & UPDATE DATABASE
			// $id = \Input::get('id');
   //     	$post = \Post::findOrFail($id);
			// if($post->image) {
   //             $oldFile = $upload_dir . $post->image;
   //             \File::delete($oldFile);
   //         }
			// $post->image = $uploader->getFileName();
   //         $post->save();
			
			return \Response::json(array('success' => true, 'source' => $uploader->getFileName()));
			
		} catch (Exception $ex) {
			exit(\Response::json(array('success' => false, 'msg' => $ex->getMessage())));  
		}
	}
}