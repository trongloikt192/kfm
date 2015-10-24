<?php

class Setting extends \Eloquent {
	protected $table = 'settings';

	protected $fillable = ['company', 'logo', 'sologan', 'silde_images', 'map_position', 'email', 'phone_number', 'address'];
}