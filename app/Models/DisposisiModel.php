<?php

namespace App\Models;

use CodeIgniter\Model;

class DisposisiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'disposisi';
    protected $primaryKey       = 'no';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getNama()
    {
        return $this->join('pegawai', 'fk_pegawai = nip')
            ->select('disposisi.*, nama');
    }

    public function PegawaiSurat()
    {
        return $this->join('pegawai', 'fk_pegawai = nip', 'LEFT')
            ->join('surat_masuk', 'fk_surat = surat_masuk.no', 'LEFT')
            ->select('disposisi.*, pegawai.*, surat_masuk.scan as scan_surat, surat_masuk.no as no_surat');
    }
}
