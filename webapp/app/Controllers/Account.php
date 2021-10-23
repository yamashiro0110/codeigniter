<?php

namespace App\Controllers;

class Account extends BaseController
{
    public function index()
    {
        echo view('template/header');
        echo view('account/index', ['id' => session('userId')]);
        echo view('template/footer');
    }
}
