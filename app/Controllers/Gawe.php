<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Database\Query;

class Gawe extends BaseController
{
	public function index()
	{
		$builder = $this->db->table('gawe')->get()->getResult();
		// $query = $builder;

		$data = [
			'gawe'=> $builder
		];

		return view('gawe/get', $data);
	}

	public function add()
	{
		return view('gawe/add');
	}

	public function store()
	{
		// cara 1 : Jika name sama
		$data = $this->request->getPost();
		$this->db->table('gawe')->insert($data);

		if($this->db->affectedRows() > 0 ) {
			return redirect()->to(site_url('gawe'))->with('success', 'Data berhasil disimpan.');
		}
	}
}