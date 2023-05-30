<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Pegawai extends ResourceController
{
    protected $modelName = 'App\Models\PegawaiModel';

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        if ($this->request->isAJAX()) {
            $data['data'] = $this->model->findAll();

            return $this->response->setJSON($data);
        } else {
            $data['title'] = 'Data Pegawai';
            return view('admin/pegawai', $data);
        }
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $data = $this->request->getVar();
        $this->model->save($data);
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->model->delete($id);
    }

    public function select2()
    {
        $query = $this->request->getVar('q');

        if ($query) {
            $array = $this->model->search($query)->findAll();
        } else {
            $array = $this->model->findAll();
        }

        $newArray = array_map(function ($item) {
            return ['text' => $item['nama'], 'id' => $item['nip']];
        }, $array);

        $data['results'] = $newArray;

        return $this->response->setJSON($data);
    }
}
