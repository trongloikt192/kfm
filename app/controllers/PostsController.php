<?php


class PostsController extends \BaseController {

    public function index()
    {
        $cat_title = 'Bài viết';
        $posts = Post::where('status', '1')->orderBy('updated_at', 'desc')->paginate(10);

        return View::make('f11', compact('posts', 'cat_title'));
    }

    
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->get();

        $post = $post[0];
        $id = $post->id;

        $tags = $post->tags;
        $refs = array();

        foreach ($tags as $tag) {
        	// $refs = Tag::where('tag', $tag->id);
        	$posts = $tag->posts()->orderBy('updated_at', 'desc')->paginate(5);
        	foreach ($posts as $ref_post) {
        		if( !in_array($ref_post->id, $refs) && $ref_post->id != $id ) {
        			array_push($refs, $ref_post->id);
        		}
        	}
        }

        // $ref_posts = Post::findMany($refs);
        $ref_posts = Post::select(['id', 'title', 'slug', 'created_at'])->whereIn('id', $refs)->get();

        return View::make('f02', compact('post', 'ref_posts'));
    }


    public function postsForCategory($id) 
    {
        $cat_title = Category::find($id)->name;
        $posts = Post::where(['category_id' => $id, 'status'=>'1'])
                ->orderBy('updated_at', 'desc')
                ->paginate(10);

        return View::make('f11', compact('posts', 'cat_title'));
    }
}
