<?php

namespace App\Controllers;

trait ControllerSupport
{
    public function parser()
    {
        return \Config\Services::parser();
    }

    public function getVar(string $param)
    {
        return $this->request->getVar($param);
    }
}
