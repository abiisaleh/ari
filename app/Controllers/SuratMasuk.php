<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class SuratMasuk extends ResourceController
{
    protected $modelName = 'App\Models\SuratMasukModel';

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
            $data['title'] = 'Surat Masuk';
            return view('admin/suratMasuk', $data);
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
        $data = [
            'no' => $this->request->getVar('no'),
            'tgl_surat' => $this->request->getVar('tgl_surat'),
            'tgl_terima' => $this->request->getVar('tgl_terima'),
            'sifat' => $this->request->getVar('sifat'),
            'perihal' => $this->request->getVar('perihal'),
            'asal' => $this->request->getVar('asal'),
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
        $data = [
            'no' => $id,
            'read' => 1,
        ];

        $this->model->save($data);
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

    public function disposisi()
    {
        if ($this->request->isAJAX()) {
            $data['data'] = $this->model->disposisi()->find();

            return $this->response->setJSON($data);
        }
    }
}
