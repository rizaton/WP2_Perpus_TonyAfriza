<?php
defined('BASEPATH') or exit('No direct script access allowed');

namespace App\Models;

use CodeIgniter\Model;

class ModelAdmin extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'kdadmin';

    public function getAdmin()
    {
        return $this->findAll();
    }

    public function adminWhere($where)
    {
        return $this->where($where)->findAll();
    }

    public function simpanAdmin($dataAdmin)
    {
        return $this->insert($dataAdmin);
    }

    public function updateAdmin($dataUpdate = null, $whereAdmin = null)
    {
        return $this->update($whereAdmin, $dataUpdate);
    }

    public function hapusAdmin($hapusData)
    {
        return $this->delete($hapusData);
    }
}
