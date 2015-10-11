<?php

class Contact extends \Eloquent {
	protected $table = 'contacts';

	protected $fillable = ['full_name', 'company', 'email', 'phone_number', 'content', 'status'];

	public static $rules = [
		'full_name' => 'required'
		, 'company' => 'required'
		, 'email' => 'required'
		, 'phone_number' => 'required'
		, 'content' => 'required'
	];
}