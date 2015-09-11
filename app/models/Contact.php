<?php

class Contact extends \Eloquent {
	protected $table = 'contacts';

	protected $fillable = ['status'];

	public static $rules = [
		'name' => 'required|min:3'
		, 'address' => 'required|min:10'
		, 'email' => 'required|min:3'
		, 'phone_number' => 'required|min:3'
	];
}