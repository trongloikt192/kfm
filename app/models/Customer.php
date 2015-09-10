<?php

class Customer extends \Eloquent {
	protected $table = 'customers';

	protected $fillable = ['name', 'business_scope', 'delegate', 'address', 'email', 'phone_number', 'domain', 'logo'];

	public static $rules = [
		'name' => 'required|min:3'
		, 'address' => 'required|min:10'
		, 'email' => 'required|min:3'
		, 'phone_number' => 'required|min:3'
	];
}