<?php

class Post extends \Eloquent {
	protected $table = 'posts';

	protected $fillable = ['name', 'description', 'parent_id'];

	public static $rules = [
		'title' => 'required|min:3',
		'content_vi' => 'required|min:100'
	];

	public static function validate($data){
		return Validator::make($data, static::$rules);
	}
}