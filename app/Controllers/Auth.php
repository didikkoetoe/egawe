<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Auth extends BaseController
{
	public function index()
	{
		return redirect()->to(site_url('login'));
	}

	public function login()
	{
		return view('auth/login');
	}
}