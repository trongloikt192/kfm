<?php

class Faq extends \Eloquent {
	protected $table = 'faq';

	protected $fillable = ['status', 'reply_content', 'title', 'full_name', 'address', 'company', 'competence', 'email', 'content'];

	public static $rules = [
		'title' => 'required'
		, 'full_name' => 'required'
		, 'content' => 'required'
	];
}