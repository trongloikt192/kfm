<?php

class Document extends \Eloquent {
	protected $table = 'documents';

	protected $fillable = ['name'];

	public static $rules = [
		'name' => 'required|min:3'
	];

	public function posts()
	{
		return $this->belongsToMany('Post');
	}
}