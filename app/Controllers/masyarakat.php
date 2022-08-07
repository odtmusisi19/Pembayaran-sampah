<?php

namespace App\Controllers;

use App\Models\pembayaranModel;
use App\Models\masyarakatModel;
use App\Models\dusunModel;
use App\Models\PetugasModel;


class Masyarakat extends BaseController
{
    protected $masyarakat;
    protected $pembayaran;
    protected $dusun;
    protected $petugas;
    function __construct()
    {
        $this->masyarakat = new MasyarakatModel();
        $this->pembayaran = new pembayaranModel();
        $this->dusun = new dusunModel();
        $this->petugas = new PetugasModel();
    }
    public function index()
    {
        $data_join =  $this->pembayaran->getJoin()->getResult();
        $data = [
            'datajoin' => $data_join
        ];
        if (session()->get('username ') !== null) {
            return view('admin/masyarakat/index', $data);
        } else {
            return redirect()->to(base_url("/login"));
        }
    }
    public function create()
    {
        $data = [
            'dusun' => $this->dusun->findAll(),
            'petugas' => $this->petugas->findAll(),
        ];
        return view('admin/masyarakat/create', $data);
    }
    public function store()
    {
        //input validation
        if (!$this->validate([
            'id_masyarakat' => [ // id masyarakat diambil dari name pada element input html
                // 'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'nama_masyarakat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'tempat_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'tanggal_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'telepon' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'dusun' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'gambar' => [
                'rules' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran Gambar terlalu besar',
                    'is_image' => 'yang anda pilih bukan gambar',
                    'mime_in' => 'yang anda pilih bukan gambar',
                ]
            ],
        ])) {
            // session()->setFlashdata('error', $this->validator);
            session()->setFlashdata('nama_masyarakat', $this->validator->hasError('nama_masyarakat'));
            session()->setFlashdata('error_masyarakat', $this->validator->getError('nama_masyarakat'));
            session()->setFlashdata('jenis_kelamin', $this->validator->hasError('jenis_kelamin'));
            session()->setFlashdata('error_jenis_kelamin', $this->validator->getError('jenis_kelamin'));
            session()->setFlashdata('tempat_lahir', $this->validator->hasError('tempat_lahir'));
            session()->setFlashdata('error_tempat_lahir', $this->validator->getError('tempat_lahir'));
            session()->setFlashdata('tanggal_lahir', $this->validator->hasError('tanggal_lahir'));
            session()->setFlashdata('telepon', $this->validator->hasError('telepon'));
            return redirect()->back()->withInput();
        }

        //mengambil gambar
        $fileGambar = $this->request->getFile('gambar');
        //cek apakah tidak ada gambar yang di uplod
        if ($fileGambar->getError() == 4) {
            $namaGambar = 'default.webp';
        } else {
            //Generate nama gambar random
            $namaGambar = $fileGambar->getRandomName();
            //memindahkan file ke folder img
            $fileGambar->move('img', $namaGambar);
        }
        //mengambil nama file
        // $namaGambar = $fileGambar->getName();
        // dd($namaGambar);

        //Memasukan data ke tabel masyarakat 
        $this->masyarakat->insert([
            // 'id_masyarakat' => $this->request->getVar('id_masyarakat'),
            'nama_masyarakat' => $this->request->getVar('nama_masyarakat'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'telepon' => $this->request->getVar('telepon'),
            'gambar' => "$namaGambar"
        ]);
        //Mengambil Data dari tabel dusun
        $data_dusun = $this->dusun->where('nama_dusun', $this->request->getVar('dusun'))->first();
        //Mengambil Data dari tabel Petugas
        $data_petugas = $this->petugas->where('nama_petugas', $this->request->getVar('petugas'))->first();
        //Mengabil data id masyarakat dari tabel masyarakat dari tabel id yang telah dibuat 
        $getID_masyarakat = $this->masyarakat->where('nama_masyarakat', $this->request->getVar('nama_masyarakat'))->first();

        // dd($row);
        $data_pembayaran = [
            'id_pembayaran' =>  null,
            'id_masyarakat' =>  $getID_masyarakat->id_masyarakat,
            'id_dusun' =>  $data_dusun->id_dusun,
            // 'id_petugas' =>  $data_petugas->id_petugas,
            'tanggal_pembayaran' =>  "-",
            'jumlah' =>  0,
            'Keterangan' =>  "-",

        ];
        $this->pembayaran->saveData($data_pembayaran);
        session()->setFlashdata('message', 'Tambah Data Masyarakat Berhasil'); //set pesan jika berhasil di tambahkan
        return redirect()->to('/masyarakat'); //kemabali lagi ke halaman masyarakat 
    }
    function edit($id)
    {
        $dataMasyarakat = $this->masyarakat->find($id);
        if (empty($dataMasyarakat)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Masyarakat Tidak ditemukan !');
        }
        $data['masyarakat'] = $dataMasyarakat;
        return view('admin/masyarakat/edit', $data);
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
            'nama_masyarakat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'tempat_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'tanggal_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'telepon' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back();
        }

        $this->masyarakat->update($id, [
            'id_masyarakat' => $this->request->getVar('id_masyarakat'),
            'nama_masyarakat' => $this->request->getVar('nama_masyarakat'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'telepon' => $this->request->getVar('telepon')
        ]);
        session()->setFlashdata('message', 'Update Data Masyarakat Berhasil');
        return redirect()->to('/masyarakat');
    }

    function delete($id)
    {
        $datamasyarakat = $this->masyarakat->find($id);
        if (empty($datamasyarakat)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Masyarakat Tidak ditemukan !');
        }
        $this->masyarakat->delete($id);
        session()->setFlashdata('message', 'Delete Data Masyarakat Berhasil');
        return redirect()->to('/masyarakat');
    }
}
