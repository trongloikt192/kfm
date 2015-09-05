<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Zizaco\Entrust\HasRole;

class User extends \Eloquent {

	// This is trait for using entrust
    use HasRole;

	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

	protected $fillable = ['username', 'email','password','first_name', 'last_name', 'address', 'phone_number'];

	public static $signup_rules = [
		'username' => 'required',
		'email' => 'required',
		'password' => 'required'
	];

	public static $update_rules = [
		'username' => 'required',
		'email' => 'required'
	];


	// Accessor method to get User's full name
	// get + [FullName] + Attribute
	// => ->full_name();
    public function getFullNameAttribute() {

        if($this->first_name == null || $this->last_name == null)
        {
            return $this->username;
        }
        return $this->first_name . ' ' . $this->last_name;
    }
}