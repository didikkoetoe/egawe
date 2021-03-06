<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourcePresenter;

class Groups extends ResourcePresenter
{
    protected $modelName = 'App\Models\GroupModel';
    protected $helpers = ['custom'];

    /**
     * Present a view of resource objects
     *
     * @return mixed
     */
    public function index()
    {
        $data['groups'] = $this->model->findAll();
        return view('group/index', $data);
    }

    /**
     * Present a view to present a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Present a view to present a new single resource object
     *
     * @return mixed
     */
    public function new()
    {
        return view('group/new');
    }

    /**
     * Process the creation/insertion of a new resource object.
     * This should be a POST.
     *
     * @return mixed
     */
    public function create()
    {
        $this->model->insert($this->request->getPost());
        return redirect()->to(site_url('groups'))->with('success', 'Data group berhasil di tambahkan.');
    }

    /**
     * Present a view to edit the properties of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $data['group'] = $this->model->where('id_group', $id)->first();
        return view('group/edit', $data);
    }

    /**
     * Process the updating, full or partial, of a specific resource object.
     * This should be a POST.
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $data = $this->request->getVar();
        $this->model->update($id, $data);

        return redirect()->to(site_url('groups'))->with('success', 'Data group berhasil di update');
    }

    /**
     * Present a view to confirm the deletion of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function remove($id = null)
    {
        //
    }

    /**
     * Process the deletion of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->model->delete($id);

        return \redirect()->to(\site_url('groups'))->with('success', 'Data berhasil di hapus');
    }

    public function trash()
    {
        $data['groups'] = $this->model->onlyDeleted()->findAll();

        return view('group/trash', $data);
    }

    public function restore($id = null)
    {
        $this->db = \Config\Database::connect();
        if ($id != null) {
            $this->db->table('groups')
                ->set('deleted_at', null, true)
                ->where(['id_group' => $id])
                ->update();

            return \redirect()->to(site_url('groups'))->with('success', 'Data berhasil di restore');
        } else {
            $this->db->table('groups')
                ->set('deleted_at', null, true)
                ->where('deleted_at is NOT NULL', NULL, FALSE)
                ->update();

            return \redirect()->to(site_url('groups'))->with('success', 'Data berhasil di restore');
        }
    }

    public function delete2($id = null)
    {
        if (!is_null($id)) {
            $this->model->delete($id, true);
            return \redirect()->to(\site_url('groups'))->with('success', 'Data berhasil di hapus');
        } else {
            $this->model->purgeDeleted($id);
            return \redirect()->to(\site_url('groups'))->with('success', 'Data berhasil di hapus');
        }
    }
}