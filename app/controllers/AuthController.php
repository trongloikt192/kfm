<?php

class AuthController extends \BaseController {

	public function getLogin() {
		return View::make('f04');
	}

}