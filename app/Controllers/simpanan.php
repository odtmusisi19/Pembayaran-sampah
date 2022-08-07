<?php

namespace App\Controllers;

use App\Models\SimpananModel;

class Simpanan extends BaseController
{
    protected $modelsimpanan;
    public function __construct()
    {
        $this->modelsimpanan = new SimpananModel();
    }
    // public function index()
    // {
    //     $data_simpanan =  $this->modelsimpanan->getSimpanan()->getResult();
    //     $data = array(
    //         'title' => 'Data Simpanan',
    //         'content' => $data_simpanan
    //     );
    //     echo view('view_simpanan', $data);
    // }
    public function index()
    {
        $data_simpanan =  $this->modelsimpanan->getSimpanan()->getResult();
        $data_join3 =  $this->modelsimpanan->getSimpanan1()->getResult(); //script join 3 tabel
        $data = array(
            'title' => 'Data Simpanan',
            'content' => $data_simpanan,
            'join3' => $data_join3    //script join 3 tabel         
        );
        echo view('view_simpanan', $data);
    }
}
