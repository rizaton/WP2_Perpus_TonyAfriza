<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBuku extends Model
{
    protected $table = 'buku';
    protected $primaryKey = 'id';

    // Manajemen buku
    public function getBuku()
    {
        return $this->findAll();
    }

    public function bukuWhere($where)
    {
        return $this->where($where)->findAll();
    }

    public function simpanBuku($data = null)
    {
        return $this->insert($data);
    }

    public function updateBuku($data = null, $where = null)
    {
        return $this->update($where, $data);
    }

    public function hapusBuku($where = null)
    {
        return $this->delete($where);
    }

    public function total($field, $where)
    {
        $query = $this->selectSum($field);
        if (!empty($where) && count($where) > 0) {
            $query->where($where);
        }
        $result = $query->get()->getRow();
        return $result->$field ?? 0;
    }

    // Manajemen kategori
    public function getKategori()
    {
        return $this->db->table('kategori')->get()->getResult();
    }

    public function kategoriWhere($where)
    {
        return $this->db->table('kategori')->getWhere($where)->getResult();
    }

    public function simpanKategori($data = null)
    {
        return $this->db->table('kategori')->insert($data);
    }

    public function hapusKategori($where = null)
    {
        return $this->db->table('kategori')->delete($where);
    }

    public function updateKategori($where = null, $data = null)
    {
        return $this->db->table('kategori')->update($data, $where);
    }

    // Join
    public function joinKategoriBuku($where)
    {
        return $this->select('buku.id_kategori, kategori.kategori')
            ->join('kategori', 'kategori.id = buku.id_kategori')
            ->where($where)
            ->get()
            ->getResult();
    }
}
