<?php

namespace App\Controllers;

use App\Models\pembayaranModel;
use App\Models\masyarakatModel;
use App\Models\dusunModel;
use App\Models\PetugasModel;


class Pembayaran extends BaseController
{
    protected $pembayaran;
    protected $masyarakat;
    protected $dusun;
    protected $petugas;



    function __construct()
    {
        $this->pembayaran = new pembayaranModel();
        $this->masyarakat = new masyarakatModel();
        $this->dusun = new dusunModel();
        $this->petugas = new PetugasModel();
    }

    public function index()
    {
        $data_join =  $this->pembayaran->getJoin()->getResult();
        $data = [
            'pembayaran' => $this->pembayaran->findAll(),
            'masyarakat'  => $this->masyarakat->findAll(),
            'petugas'  => $this->petugas,
            'datajoin' => $data_join
        ];
        if (session()->get('username ') !== null) {
            return view('admin/pembayaran/index', $data);
        } else {
            return redirect()->to('/login');
        }
    }
    function cetak($id)
    {
        $data_join =  $this->pembayaran->getJoin()->getResult();
        $data_masyarakat = $this->pembayaran->find($id);
        $data = [
            'pembayaran' =>  $this->pembayaran->find($id),
            'petugas' =>  $this->petugas,
            'masyarakat'  =>  $this->masyarakat->where('id_masyarakat', $data_masyarakat->id_masyarakat)->first(),
            'dusun'  =>  $this->dusun->where('id_dusun', $this->pembayaran->find($id)->id_dusun)->first(),
            'datajoin' => $data_join
        ];
        $dataPembayaran = $this->pembayaran->find($id);
        if (empty($dataPembayaran)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Pembayaran Tidak ditemukan !');
        }
        $data['pembayaran'] = $dataPembayaran;
        return view('admin/pembayaran/cetak', $data);
    }
    public function create()
    {

        if (session()->get('username ') !== null) {
            return view('admin/pembayaran/create');
        } else {
            return redirect()->to(base_url("/login"));
        }
    }
    public function store()
    {
        if (session()->get('username ') !== null) {
            return view('admin/pembayaran/create');

            if (!$this->validate([
                'id_pembayaran' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus diisi'
                    ]
                ],
                'id_masyarakat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus diisi'
                    ]
                ],
                'id_dusun' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus diisi'
                    ]
                ],
                'id_petugas' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus diisi',
                    ]
                ],
                'tanggal_pembayaran' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus diisi',
                    ]
                ],
                'jumlah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus diisi'
                    ]
                ],
                'keterangan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus diisi'
                    ]
                ],
            ])) {
                session()->setFlashdata('error', $this->validator->listErrors());
                return redirect()->back()->withInput();
            }
        } else {
            return redirect()->to(base_url("/login"));
        }
        $this->pembayaran->insert([
            'id_masyarakat' => $this->request->getVar('id_masyarakat'),
            'id_masyarakat' => $this->request->getVar('id_masyarakat'),
            'id_dusun' => $this->request->getVar('id_dusun'),
            'id_petugas' => $this->request->getVar('id_petugas'),
            'tanggal_pembayaran' => $this->request->getVar('tanggal_pembayaran'),
            'jumlah' => $this->request->getVar('jumlah'),
            'keterangan' => $this->request->getVar('keterangan')
        ]);
        session()->setFlashdata('message', 'Tambah Data pembayaran Berhasil');
        return redirect()->to('/pembayaran');
    }
    function edit($id)
    {
        $data_join =  $this->pembayaran->getJoin()->getResult();
        $dataPembayaran = $this->pembayaran->find($id);
        if (empty($dataPembayaran)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data pembayaran Tidak ditemukan !');
        }
        $data_masyarakat = $this->pembayaran->find($id);

        $data = [
            'pembayaran' =>  $this->pembayaran->find($id),
            'masyarakat'  =>  $this->masyarakat->where('id_masyarakat', $data_masyarakat->id_masyarakat)->first(),
            'dusun'  =>  $this->dusun->where('id_dusun', $this->pembayaran->find($id)->id_dusun)->first(),
            'nama_petugas'  =>  $this->petugas->where('id_petugas', $this->pembayaran->find($id)->id_petugas)->first(),
            'petugas' => $this->petugas->findAll(),
            'datajoin' => $data_join
        ];
        if (session()->get('username ') !== null) {
            return view('admin/pembayaran/edit', $data);
        } else {
            return redirect()->to(base_url("/login"));
        }
    }
    public function update($id)
    {
        if (!$this->validate([
            //     'id_pembayaran' => [
            //         'rules' => 'required',
            //         'errors' => [
            //             'required' => '{field} Harus diisi'
            //         ]
            //     ],
            //     'id_masyarakat' => [
            //         'rules' => 'required',
            //         'errors' => [
            //             'required' => '{field} Harus diisi'
            //         ]
            //     ],
            //     'id_dusun' => [
            //         'rules' => 'required',
            //         'errors' => [
            //             'required' => '{field} Harus diisi'
            //         ]
            //     ],
            'jumlah' => [
                'rules' => 'required|integer|min_length[4]|max_length[20]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'integer' => '{field} Harus Diisi dengan angka',
                    'min_length' => 'Isi {field} Minimal 4 angka',
                    'max_length' => '{field} Maksimal 20 angka',
                ]
            ],
            //     'tanggal_pembayaran' => [
            //         'rules' => 'required',
            //         'errors' => [
            //             'required' => '{field} Harus diisi',
            //         ]
            //     ],
            //     'jumlah' => [
            //         'rules' => 'required',
            //         'errors' => [
            //             'required' => '{field} Harus diisi'
            //         ]
            //     ],
            //     'keterangan' => [
            //         'rules' => 'required',
            //         'errors' => [
            //             'required' => '{field} Harus diisi'
            //         ]
            //     ],

        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back();
        }

        $getid = $this->petugas->where('nama_petugas', $this->request->getVar('petugas'))->first();
        $this->pembayaran->update($id, [
            // 'id_masyarakat' => $this->request->getVar('id_masyarakat'),
            // 'id_masyarakat' => $this->request->getVar('id_masyarakat'),
            // 'id_dusun' => $this->request->getVar('id_dusun'),
            // 'id_petugas' => $this->request->getVar('id_petugas'),
            // 'tanggal_pembayaran' => $this->request->getVar('tanggal_pembayaran'),
            // 'jumlah' => $this->request->getVar('jumlah'),
            // 'keterangan' => $this->request->getVar('keterangan')
            'jumlah' => $this->request->getVar('jumlah'),
            'id_petugas' => $getid->id_petugas,
            'tanggal_pembayaran' =>  $this->request->getVar('tanggal_pembayaran'),
            'keterangan' =>  $this->request->getVar('keterangan')
        ]);
        session()->setFlashdata('message', 'Update Data pembayaran Berhasil');
        return redirect()->to('/pembayaran');
    }
    function delete($id)
    {
        $getId_Pembayaran = $this->pembayaran->find($id);
        if (empty($getId_Pembayaran)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data pembayaran Tidak ditemukan !');
        }
        $getId_masyarakat = $this->masyarakat->where('id_masyarakat', $getId_Pembayaran->id_masyarakat)->first();
        // dd($getId_masyarakat);
        $this->pembayaran->delete($id);
        $this->masyarakat->delete($getId_masyarakat->id_masyarakat);
        session()->setFlashdata('message', 'Delete Data pembayaran Berhasil');
        return redirect()->to('/pembayaran');
    }
    function batal()
    {
        return redirect()->to('/pembayaran');
    }
}
