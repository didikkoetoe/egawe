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
}