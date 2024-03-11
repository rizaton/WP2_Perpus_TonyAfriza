<?php
defined('BASEPATH') or exit('No direct script access allowed');

namespace App\Models;

use CodeIgniter\Model;

class ModelTransaksi extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'kdtransaksi';

    // Manajemen transaksi
    public function getTransaksi()
    {
        return $this->findAll();
    }

    public function transaksiWhere($where)
    {
        return $this->where($where)->findAll();
    }

    public function simpanTransaksi($data = null)
    {
        return $this->insert($data);
    }

    public function updateTransaksi($data = null, $where = null)
    {
        return $this->update($where, $data);
    }

    public function hapusTransaksi($where = null)
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

    // Join
    public function joinTransaksiAdmin($where)
    {
        return $this->select('transaksi.kdtransaksi, admin.kdadmin')
            ->join('admin', 'admin.kdadmin = transaksi.admin_kdadmin')
            ->where($where)
            ->get()
            ->getResult();
    }
}
