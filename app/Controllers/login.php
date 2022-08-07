<?php

namespace App\Controllers;

use App\Models\UserModel;

$session = \Config\Services::session();

class Login extends BaseController
{
    protected $petugas;
    protected $session;

    function __construct()
    {
        $this->petugas = new UserModel();
        $this->session = \Config\Services::session();
        $this->session->start();
    }
    public function index()
    {
        $data['petugas'] = $this->petugas->findAll();
        return view('admin/index', $data);
    }
    public function process()
    {

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $dataUser = $this->petugas->where(['username' => $username,])->first();
        if ($dataUser) {
            if (password_verify($password, $dataUser->password)) {
                $this->session->set([
                    'username' => $dataUser->name,
                    // 'nama_petugas' => $dataUser->nama_petugas,
                    'logged_in' => TRUE
                ]);
                return view('layout_admin/index');
            } else {
                session()->setFlashdata('error', 'Username & Password Salah');

                return redirect()->to(base_url('/login'));
            }
        } else {
            session()->setFlashdata('error', 'Username & Password Salah');
            // return redirect()->back();
            return redirect()->to(base_url('/login'));
        }
    }

    function logout()
    {
        session()->destroy();
        return redirect()->to(base_url("/login"));
    }
}
