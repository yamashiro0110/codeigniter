<?php

namespace App\Helpers;

trait ControllerHelper
{
    /**
     * View Parserを取得
     *
     * @return \CodeIgniter\View\Parser
     */
    public function parser()
    {
        return \Config\Services::parser();
    }

    /**
     * RequestParameter
     *
     * @return string
     */
    public function requestParam(string $param)
    {
        return $this->request->getVar($param);
    }
}
