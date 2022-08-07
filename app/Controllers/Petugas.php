<?php

namespace App\Controllers;

use App\Models\PetugasModel;


class Petugas extends BaseController
{
    protected $petugas;
    function __construct()
    {
        $this->petugas = new PetugasModel();
    }

    public function index()
    {
        $data['petugas'] = $this->petugas->findAll();
        if (session()->get('username') !== null) {
            return view('admin/petugas/index', $data);
        } else {
            return redirect()->to('/login');
        }
    }

    public function create()
    {
        return view('admin/petugas/create');
    }

    public function store()
    {
        //input validation
        if (!$this->validate([
            'nama_petugas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'telepon' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],

        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $this->petugas->insert([
            'nama_petugas' => $this->request->getVar('nama_petugas'),
            'telepon' => $this->request->getVar('telepon'),
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password'),
        ]);
        session()->setFlashdata('message', 'Tambah Data Masyarakat Berhasil'); //set pesan jika berhasil di tambahkan
        return redirect()->to('/petugas'); //kemabali lagi ke halaman masyarakat 
    }
    function edit($id)
    {
        $dataPetugas = $this->petugas->find($id);
        if (empty($dataPetugas)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Petugas Tidak ditemukan !');
        }
        $data['petugas'] = $dataPetugas;
        return view('admin/petugas/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'id_masyarakat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'nama_petugas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'telepon' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back();
        }

        $this->petugas->update($id, [
            'nama_petugas' => $this->request->getVar('nama_petugas'),
            'telepon' => $this->request->getVar('telepon'),
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('tanggal_lahir'),
        ]);
        session()->setFlashdata('message', 'Update Data Masyarakat Berhasil');
        return redirect()->to('/petugas');
    }

    function delete($id)
    {
        $datapetugas = $this->petugas->find($id);
        if (empty($datapetugas)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data petugas Tidak ditemukan !');
        }
        $this->petugas->delete($id);
        session()->setFlashdata('message', 'Delete Data Masyarakat Berhasil');
        return redirect()->to('/petugas');
    }
    //TODO mencoba
    function jembeng()
    {
        // $datamasyarakat = $this->masyarakat->find($id);
        // d($datamasyarakat);
        date_default_timezone_set("Asia/Jakarta");

        $session = session();
        $userName = $session->get('username ');
        echo gethostname();
        if ($userName !== null) {
            echo ' login';
        } else {
            echo 'not login';
        }
        // echo date("Y-m-d");
        // dd($this->masyarakat->findAll());
    }
}
