<?php

class Faq extends \Eloquent {
	protected $table = 'faq';

	protected $fillable = ['title', 'content', 'status', 'reply_content'];

	public static $rules = [
		'full_name' => 'required|min:3'
		, 'title' => 'required|min:10'
		// , 'content' => 'required|min:50'
	];
}