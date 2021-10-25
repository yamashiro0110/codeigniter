<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Session implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        session();
        log_message('debug', 'sessionを生成しました id:{id}', ['id' => session_id()]);
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // 何もしない
    }
}
