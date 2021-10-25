<?php

namespace App\Controllers;

use CodeIgniter\View\Parser;

class Form extends BaseController
{
    public function index()
    {
        echo view('template/header');
        echo view('form/index');
        echo view('template/footer');
    }

    public function post()
    {
        $parser = \Config\Services::parser();

        $data['value'] = $this->request->getVar('value');
        echo view('template/header');
        // echo view('form/result', $data);
        echo $parser->setData($data)->render('form/result');
        echo view('template/footer');
    }
}
