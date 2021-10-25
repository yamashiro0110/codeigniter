<?php

namespace App\Controllers;

use CodeIgniter\View\Parser;

class Form extends BaseController
{
    use ControllerSupport;

    public function index()
    {
        echo view('template/header');
        echo view('form/index');
        echo view('template/footer');
    }

    public function post()
    {
        $parser = $this->parser();
        $data['value'] = $this->request->getVar('value');
        echo $parser->render('template/header');
        echo $parser->setData($data)->render('form/result');
        echo $parser->render('template/footer');
    }
}
