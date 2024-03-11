<?php
defined('BASEPATH') or exit('No direct script access allowed');

namespace App\Models;

use CodeIgniter\Model;

class ModelDetailPesanan extends Model
{
    protected $table = 'detail_pesanan';
    protected $primaryKey = 'kddetail_pesanan';

    // Manajemen detail_pesanan
    public function getDetailPesanan()
    {
        return $this->joinTable()->findAll();
    }

    public function detail_pesananWhere($where)
    {
        return $this->joinTable()->where($where)->findAll();
    }

    public function simpanDetailPesanan($data = null)
    {
        return $this->joinTable()->insert($data);
    }

    public function updateDetailPesanan($data = null, $where = null)
    {
        return $this->joinTable()->update($where, $data);
    }

    public function hapusDetailPesanan($where = null)
    {
        return $this->joinTable()->delete($where);
    }
    // Join
    private function joinTable()
    {
        $this->join('transaksi', 'transaksi.kdtransaksi = detail_pesanan.transaksi_kdtransaksi', 'LEFT');
        $this->join('menu', 'menu.kdmenu = detail_pesanan.menu_kdmenu', 'LEFT');
        $this->select('menu.kdmenu');
        $this->select('transaksi.kdtransaksi');
        $this->select('detail_transaksi.*');
        return $this;
    }
}
