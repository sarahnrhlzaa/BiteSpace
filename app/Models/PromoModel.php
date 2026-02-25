<?php

namespace App\Models;

use CodeIgniter\Model;

class PromoModel extends Model
{
    protected $table            = 'promo';
    protected $primaryKey       = 'id_promo';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['kode_promo', 'nama_promo', 'deskripsi', 'tipe_diskon', 'nilai_diskon', 'maks_diskon', 'min_transaksi', 'tanggal_mulai', 'tanggal_selesai', 'is_active'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts        = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules = [
        'kode_promo'      => 'required|max_length[20]',
        'nama_promo'      => 'required|max_length[100]',
        'tipe_diskon'     => 'required|in_list[percent,nominal]',
        'nilai_diskon'    => 'required|decimal|greater_than[0]',
        'min_transaksi'   => 'required|decimal',
        'tanggal_mulai'   => 'required|valid_date',
        'tanggal_selesai' => 'required|valid_date',
    ];
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
}