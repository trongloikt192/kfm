<?php

class Tag extends \Eloquent {
	protected $table = 'tags';

	protected $fillable = ['name'];

	public static $rules = [
		'name' => 'required|min:3'
	];

	public function posts()
	{
		return $this->belongsToMany('Post');
	}
}