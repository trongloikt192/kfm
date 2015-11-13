<?php

class Document extends \Eloquent {
	protected $table = 'documents';

	protected $fillable = ['name', 'link'];

	public static $rules = [
		'name' => 'required'
	];

	public function posts()
	{
		return $this->belongsToMany('Post');
	}
}