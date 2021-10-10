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
		// dd($this->request->getVar());
		if(!$this->validate([
			'full_name' => [
				'rules' => 'required|string',
				'errors' => [
					'required' => 'Nama harus di isi',
					'string' => 'Nama harus berupa karakter A-Z'
				]
			],
			'email' => [
				'rules' => 'required|valid_email',
				'errors' => [
					'required' => 'Email harus di isi',
					'valid_email' => 'Email tidak valid'
				]
			],
			'password' => [
				'rules' => 'required|min_length[8]',
				'errors' => [
					'required' => 'Password harus di isi',
					'min_length' => 'Password terlalu pendek. Minimal 8 karakter'
				]
			],
			'password2' => [
				'rules' => 'required|matches[password]',
				'errors' => [
					'required' => 'Konfirmasi password harus di isi',
					'matches' => 'Konfirmasi password tidak sama'
				]
			]
		])) {
			return redirect()->to(site_url('Auth/new'))->withInput();
		}

		// Proses password user
		$password = password_hash($this->request->getPost('password'), PASSWORD_BCRYPT);

		// Proses data user
		$this->db->table('users')->insert([
			'name_user' => $this->request->getPost('full_name'),
			'email_user' => $this->request->getPost('email'),
			'password_user' => $password
		]);

		return redirect()->to(site_url('login'))->with('create', 'Akun anda berhasil terdaftar');
	}
}