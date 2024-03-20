<?php

namespace App\Controllers;

use App\Models\ModelMenu;

class Menu extends BaseController
{
    protected $helpers = ['url', 'form'];
    protected $modelMenu;
    private $validation_errors = [
        'kode' => [
            'label' => 'Kode Menu',
            'rules' => 'required|min_length[1]',
            'errors' => [
                'required' => 'Kode menu harus diisi',
                'min_length' => 'Kode menu terlalu pendek'
            ]
        ],
        'nama' => [
            'label' => 'Nama Menu',
            'rules' => 'required|min_length[3]',
            'errors' => [
                'required' => 'Nama menu harus diisi',
                'min_length' => 'Nama menu terlalu pendek'
            ]
        ],
        'harga' => [
            'label' => 'Harga Menu',
            'rules' => 'required|min_length[3]',
            'errors' => [
                'required' => 'Harga harus diisi',
                'min_length' => 'Harga terlalu kecil'
            ]
        ],
        'gambar' => [
            'label' => 'Gambar Menu',
            'rules' => 'required|min_length[6]',
            'errors' => [
                'required' => 'Data gambar harus diisi',
                'min_length' => 'Gambar tidak valid'
            ]
        ],
    ];
    private function data($message = null)
    {
        $menu = $this->modelMenu->getMenu();
        return [
            'message' => $message,
            'menu' => $menu,
        ];
    }
    private function dataGet()
    {
        return [
            'kdmenu' => $this->request->getPost('kode'),
            'nmmenu' => $this->request->getPost('nama'),
            'harga' => $this->request->getPost('harga'),
            'gambar' => $this->request->getPost('gambar'),
        ];
    }

    public function __construct()
    {
        $this->modelMenu = new ModelMenu();
        $this->modelMenu->protect(false);
    }

    public function index()
    {
        return view('view_form', $this->data());
    }
    public function create()
    {
        if (!$this->validate($this->validation_errors)) {
            return view('view_form', $this->data(validation_list_errors()));
        } else {
            try {
                $this->modelMenu->simpanMenu($this->dataGet());
                return view('view_form', $this->data('berhasil'));
            } catch (\Throwable $th) {
                return view('view_form', $this->data($th));
            }
        }
    }
    public function update()
    {
        if (!$this->validate($this->validation_errors)) {
            return view('view_form', $this->data(validation_list_errors()));
        } else {
            $whereData = [
                'kdmenu' => $this->request->getPost('kode'),
            ];
            try {
                $this->modelMenu->updateMenu($this->dataGet(), $whereData);
                return view('view_form', $this->data('berhasil'));
            } catch (\Throwable $th) {
                return view('view_form', $this->data($th));
            }
        }
    }
    public function delete()
    {
        $validate = [
            'kode' => [
                'label' => 'Kode Menu',
                'rules' => 'required|min_length[1]',
                'errors' => [
                    'required' => 'Kode menu harus diisi',
                    'min_length' => 'Kode menu terlalu pendek'
                ]
            ],
        ];
        if (!$this->validate($validate)) {
            return view('view_form', $this->data(validation_list_errors()));
        } else {
            try {
                $this->modelMenu->delete($this->request->getPost('kode'));
                return view('view_form', $this->data('berhasil'));
            } catch (\Throwable $th) {
                return view('view_form', $this->data($th));
            }
        }
    }
}
