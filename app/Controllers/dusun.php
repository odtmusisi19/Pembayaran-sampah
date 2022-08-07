<?php

namespace App\Controllers;

use App\Models\dusunModel;

class Dusun extends BaseController
{
    protected $dusun;

    function __construct()
    {
        $this->dusun = new DusunModel();
    }

    public function index()
    {
        $data['dusun'] = $this->dusun->findAll();

        if (session()->get('username ') !== null) {
            return view('admin/dusun/index', $data);
        } else {
            return redirect()->to('/login');
        }
    }

    public function create()
    {
        return view('admin/dusun/create');
    }

    public function store()
    {
        if (!$this->validate([
            // 'id_dusun' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => '{field} Harus diisi'
            //     ]
            // ],
            'nama_dusun' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'rt' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],

        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $this->dusun->insert([
            'id_dusun' => $this->request->getVar('id_dusun'),
            'nama_dusun' => $this->request->getVar('nama_dusun'),
            'rt' => $this->request->getVar('rt')
        ]);
        session()->setFlashdata('message', 'Tambah Data dusun Berhasil');
        return redirect()->to('/dusun');
    }

    function edit($id)
    {
        $dataDusun = $this->dusun->find($id);
        if (empty($dataDusun)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Dusun Tidak ditemukan !');
        }
        $data['dusun'] = $dataDusun;

        if (session()->get('username ') !== null) {
            return view('admin/dusun/edit', $data);
        } else {
            return redirect()->to('/login');
        }
    }

    public function update($id)
    {
        if (!$this->validate([
            'id_dusun' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'nama_dusun' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'rt' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back();
        }

        $this->dusun->update($id, [
            'id_dusun' => $this->request->getVar('id_dusun'),
            'nama_dusun' => $this->request->getVar('nama_dusun'),
            'rt' => $this->request->getVar('rt')
        ]);
        session()->setFlashdata('message', 'Update Data Dusun Berhasil');
        return redirect()->to('/dusun');
    }

    function delete($id)
    {
        $datadusun = $this->dusun->find($id);
        if (empty($datadusun)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Dusun Tidak ditemukan !');
        }
        $this->dusun->delete($id);
        session()->setFlashdata('message', 'Delete Data Dusun Berhasil');
        return redirect()->to('/dusun');
    }
}
