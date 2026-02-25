<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{
    protected $table            = 'menu';
    protected $primaryKey       = 'id_menu';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_category', 'nama_menu', 'deskripsi', 'gambar', 'harga', 'is_available'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = ['id_category' => 'required|integer', 'nama_menu' => 'required|max_length[100]', 'harga' => 'required|decimal|greater_than[0]'];
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

     // ── Get menu beserta nama kategorinya ──
    public function getMenuWithCategory()
    {
        return $this->db->table('menu m')
            ->select('m.*, c.nama_category')
            ->join('category c', 'c.id_category = m.id_category', 'left')
            ->orderBy('c.nama_category', 'ASC')
            ->orderBy('m.nama_menu', 'ASC')
            ->get()
            ->getResultArray();
    }

    // ── Get menu aktif saja (untuk POS/transaksi) ──
    public function getMenuAvailable()
    {
        return $this->db->table('menu m')
            ->select('m.*, c.nama_category')
            ->join('category c', 'c.id_category = m.id_category', 'left')
            ->where('m.is_available', 1)
            ->orderBy('c.nama_category', 'ASC')
            ->orderBy('m.nama_menu', 'ASC')
            ->get()
            ->getResultArray();
    }

    // ── Get menu per kategori (untuk POS) ──
    public function getMenuGroupedByCategory()
    {
        $menus = $this->getMenuAvailable();
        $grouped = [];
        foreach ($menus as $menu) {
            $grouped[$menu['nama_category']][] = $menu;
        }
        return $grouped;
    }
}
