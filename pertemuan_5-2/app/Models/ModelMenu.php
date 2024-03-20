<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMenu extends Model
{
    protected $table            = 'menu';
    protected $primaryKey       = 'kdmenu';

    // Functions
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
        return $this->whereIn('kdmenu', $whereMenu)
            ->set($dataUpdate)
            ->update();
    }

    public function hapusMenu($hapusData)
    {
        return $this->delete($hapusData);
    }
}
