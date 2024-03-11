<?php
defined('BASEPATH') or exit('No direct script access allowed');

namespace App\Models;

use CodeIgniter\Model;

class ModelMenu extends Model
{
    protected $table = 'menu';
    protected $primaryKey = 'kdmenu';

    public function getMenu()
    {
        return $this->findAll();
    }

    public function menuWhere($where)
    {
        return $this->where($where)->findAll();
    }

    public function simpanMenu($dataMenu)
    {
        return $this->insert($dataMenu);
    }

    public function updateMenu($dataUpdate = null, $whereMenu = null)
    {
        return $this->update($whereMenu, $dataUpdate);
    }

    public function hapusMenu($hapusData)
    {
        return $this->delete($hapusData);
    }
}
