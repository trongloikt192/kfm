<?php

class Setting extends \Eloquent {
	protected $table = 'settings';

	protected $fillable = [
	'company'
	, 'logo'
	, 'sologan'
	, 'description'
	, 'silde_images'
	, 'map_position'
	, 'email_1'
	, 'email_2'
	, 'phone_number_1'
	, 'phone_number_2'
	, 'hotline_1'
	, 'hotline_2'
	, 'address'];
}