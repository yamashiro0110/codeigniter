<?php

namespace App\Controllers;

use CodeIgniter\View\Parser;
use App\Helpers\ControllerHelper;

class Form extends BaseController
{
    use ControllerHelper;

    public function index()
    {
        echo view('template/header');
        echo view('form/index');
        echo view('template/footer');
    }

    public function post()
    {
        $parser = $this->parser();
        $data['value'] = $this->requestParam('value');
        echo $parser->render('template/header');
        echo $parser->setData($data)->render('form/result');
        echo $parser->render('template/footer');
    }
}
