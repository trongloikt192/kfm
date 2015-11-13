<?php

namespace Admin;

class AuthController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /admin/auth
	 *
	 * @return Response
	 */
	public function login()
	{
		return \View::make('admincp.b01');
	}

	// Attempt to Login user

	public function processLogin()
	{
		$validator = \User::validate_login($data = \Input::all());
		if ($validator->fails()) {
			return \Redirect::back()->withErrors($validator)->withInput(\Input::except('password'));
		}
		else {
			$user = \User::where('email', '=', $data['email_or_username'])->orWhere('username', $data['email_or_username'])->first();
  				
			// Check if user found in DB
			if ($user) {
				
				// Attempt to authenticate the User
				$attempt = \Auth::attempt(['email' => $user->email, 'password' => $data['password']], \Input::get('remember'));
				
				if($attempt) {
					return \Redirect::intended('admincp/dashboard')->withSuccess('Đăng nhập thành công');
				}
				
			}
			
			\Log::useFiles(storage_path() . '/logs/custom/' . "user_login.log", 'info');
  			\Log::info([
  				'email / username' => $data['email_or_username'],
  				'ip' => '',
  				'success' => false
  			]);
	  			
			return \Redirect::back()->withInput(\Input::except('password'))->withError(\Lang::get('larabase.invalid_credentials'));
		}
	}
	
	// Logout the user

	public function logout()
	{
		\Auth::logout();
		return \Redirect::to('admincp')->withInfo(\Lang::get('larabase.logout'));
	}
}