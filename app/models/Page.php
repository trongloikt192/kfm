<?php

class Page extends \Eloquent {
	protected $table = 'pages';
	
	protected $fillable = ['title', 'slug', 'content'];

	public static $rules = [
		'title' => 'required'
	];

	public static function validate($data){
		return Validator::make($data, static::$rules);
	}
}