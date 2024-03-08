<?php
defined('BASEPATH') or exit('No direct script access allowed');

namespace App\Models;

use CodeIgniter\Model;

class ModelUser extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';

    public function simpanData($data = null)
    {
        $this->insert($data);
    }

    public function cekData($where = null)
    {
        return $this->getWhere($where);
    }

    public function getUserWhere($where = null)
    {
        return $this->getWhere($where);
    }

    public function cekUserAccess($where = null)
    {
        return $this->db->table('access_menu')->select('*')->getWhere($where);
    }

    public function getUserLimit()
    {
        return $this->select('*')->limit(10)->offset(0)->get();
    }
}
