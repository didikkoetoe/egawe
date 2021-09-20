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

	public function edit($id = null)
	{
		if($id != null) {
			$query = $this->db->table('gawe')->getWhere(['id_gawe' => $id]);
			if($query->resultID->num_rows > 0) {
				$data['gawe'] = $query->getRow();
				return view('gawe/edit', $data);
			} else {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Data gawe tidak ditemukan');
			}
		} else {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('File tidak ditemukan');
		}
	}

	public function update($id)
	{
		// Cara 1 : Request sesui table di DB
		// $data = $this->request->getPost();
		// unset($data['_method']);

		// Cara 2 : Data spesifik
		$data = [
			'name_gawe' => $this->request->getPost('name_gawe'),
			'date_gawe' => $this->request->getPost('date_gawe'),
			'info_gawe' => $this->request->getPost('info_gawe'),
		];

		$this->db->table('gawe')->where(['id_gawe' => $id])->update($data);
		return redirect()->to(site_url('gawe'))->with('success' , 'Data berhasil di update.');
	}
}