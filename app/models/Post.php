<?php

class Post extends \Eloquent {
	protected $table = 'posts';

	protected $fillable = ['title', 'description', 'slug', 'content_vi', 'content_en', 'category_id', 'image', 'status'];

	public static $rules = [
		'title' => 'required|min:3',
		'content_vi' => 'required|min:100',
		'category_id' => 'required'
		
	];

	public static function validate($data){
		return Validator::make($data, static::$rules);
	}

	public function user()
    {
        return $this->belongsTo('User');
    }

	public function tags()
    {
        return $this->belongsToMany('Tag')->withTimestamps();
    }

    public function category()
    {
        return $this->belongsTo('Category');
    }

    public function documents()
    {
        return $this->belongsToMany('Document')->withTimestamps();
    }
}