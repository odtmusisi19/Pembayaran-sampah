<?php

namespace App\Controllers;


class Admin extends BaseController
{
    public function index()
    {
        if (session()->get('username ') !== null) {
            return view('layout_admin/index');
        } else {
            return redirect()->to(base_url("/login"));
        }
    }
}
