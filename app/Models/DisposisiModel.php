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

    public function surat()
    {
        return $this->join('surat_masuk', 'fk_surat = surat_masuk.no', 'LEFT')
            ->select('surat_masuk.* , surat_masuk.scan as scan_surat, disposisi.*');
    }
}
