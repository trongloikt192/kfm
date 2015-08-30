<?php

class Link extends \Eloquent {
	
	protected $table = 'links';

	protected $fillable = ['name', 'description'];

	public static $rules = [
		'name' => 'required',
		'link' => 'required'
	];

	public static function validate($data){
		return Validator::make($data, static::$rules);
	}
}