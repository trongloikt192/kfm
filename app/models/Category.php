<?php

class Category extends \Eloquent {


	protected $table = 'categories';

	protected $fillable = ['name', 'url', 'description', 'parent_id'];

	public static $rules = [
		'name' => 'required',
		'parent_id' => 'required'
	];

	public static function validate($data){
		return Validator::make($data, static::$rules);
	}

	public function posts()
	{
		return $this->belongsToMany('Post');
	}
	
	public function pages()
	{
		return $this->hasMany('Page');
	}

	public function parent()
    {
        return $this->belongsTo('category', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('category', 'parent_id');
    }
}