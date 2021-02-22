<?php

namespace App\Http\Controllers\Admin;

class AuthController extends AdminController
{
    public function login()
	{
	    return view('admin.login');
	}

	public function register()
	{
        return view('admin.register');
	}
}
