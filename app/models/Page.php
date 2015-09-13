<?php

class Page extends \Eloquent {
	protected $table = 'pages';
	
	protected $fillable = ['name'];

	public static $rules = [
		'name' => 'required'
	];

	public static function validate($data){
		return Validator::make($data, static::$rules);
	}
}