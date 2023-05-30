<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class SuratKeluar extends ResourceController
{
    protected $modelName = 'App\Models\SuratKeluarModel';

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
            $data['title'] = 'Surat Keluar';
            return view('admin/suratKeluar', $data);
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
        //
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
        //hapus file
        $fileName = $this->model->find($id)['scan'];
        $filePath = './uploads/' . $fileName;

        if (file_exists($filePath)) {
            if (unlink($filePath)) {
                $response = array('status' => 'success', 'message' => 'File deleted successfully.');
            } else {
                $response = array('status' => 'error', 'message' => 'Failed to delete file.');
            }
        } else {
            $response = array('status' => 'error', 'message' => 'File not found.');
        }

        //hapus data
        $this->model->delete($id);

        echo json_encode($response);
    }
}
