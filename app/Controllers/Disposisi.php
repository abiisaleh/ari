<?php

namespace App\Controllers;

use App\Models\DisposisiModel;
use CodeIgniter\RESTful\ResourceController;

class Disposisi extends ResourceController
{
    protected $model;

    public function __construct()
    {
        $this->model = new DisposisiModel();
    }

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
            $data['title'] = 'Data Disposisi';
            return view('admin/disposisi', $data);
        }
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $data['data'] = $this->model->surat()->find($id);
        $data['title'] = 'Detail Disposisi';

        return view('admin/disposisi-detail', $data);
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
        $data = [
            'no' => $this->request->getVar('no'),
            'tgl_penyelesaian' => $this->request->getVar('tgl_penyelesaian'),
            'isi' => $this->request->getVar('isi'),
            'fk_surat' => $this->request->getVar('fk_surat'),
            'fk_pegawai' => $this->request->getVar('fk_pegawai'),
        ];

        $file = $this->request->getFile('file_upload');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $data['scan'] = $newName;
            $file->move(FCPATH . 'uploads', $newName);
            echo 'File berhasil diunggah.';
            $this->model->insert($data);
        } else {
            $data = $this->request->getVar();
            $this->model->save($data);
            echo 'Data berhasil diubah.';
        }
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

    public function print($id)
    {
        $data['dispo'] = $this->model->surat()->find($id);
        return view('admin/disposisi-print', $data);
    }
}
