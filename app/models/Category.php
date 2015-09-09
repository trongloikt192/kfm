<?php

class Category extends \Eloquent {


	protected $table = 'categories';

	protected $fillable = ['name', 'description', 'parent_id'];

	public static $rules = [
		'name' => 'required|min:3'
		// 'description' => 'required|min:5'
	];

	public static function validate($data){
		return Validator::make($data, static::$rules);
	}

	public function posts()
	{
		return $this->belongsToMany('Post');
	}
}