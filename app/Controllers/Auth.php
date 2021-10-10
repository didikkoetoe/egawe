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
		if (session('id_user')) {
			return redirect()->to(site_url('home'));
		}

		return view('auth/login', ['title' => 'Login']);
	}

	public function loginProcess()
	{
		$post = $this->request->getPost();
		$query = $this->db->table('users')->getWhere(['email_user' => $post['email']]);
		if ($user = $query->getRow()) {
			if (password_verify($post['password'], $user->password_user)) {
				$params = ['id_user' => $user->id_user];
				session()->set($params);

				return redirect()->to(site_url('home'));
			} else {
				return redirect()->back()->with('error', 'Password salah.');
			}
		} else {
			return redirect()->back()->withInput()->with('error', 'Email tidak ditemukan.');
		}
	}

	public function logout()
	{
		session()->remove('id_user');

		return redirect()->to(site_url('login'))->with('success', "Anda berhasil logout");
	}

	public function new()
	{
		session();
		$data = [
			'title' => 'Create Account',
			'validation' => \Config\Services::validation()
		];

		return view('auth/new', $data);
	}

	public function create()
	{
		if(!$this->validate([
			'first_name' => 'required'
		])) {
			return redirect()->to(site_url('Auth/new'))->withInput();
		}
	}
}