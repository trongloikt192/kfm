<?php

class Post extends \Eloquent {
	protected $table = 'posts';

	protected $fillable = ['name', 'description'];

	public static $rules = [
		'title' => 'required|min:3',
		'content_vi' => 'required|min:100'
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

    public function categories()
    {
        return $this->belongsToMany('Category')->withTimestamps();
    }

    public function documents()
    {
        return $this->belongsToMany('Document')->withTimestamps();
    }
}