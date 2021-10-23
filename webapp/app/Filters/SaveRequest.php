<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class SaveRequest implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $path = $_SERVER['REQUEST_URI'];
        session('requestPath', $path);
        log_message('debug', 'リクエストパスを保存しました path:{path}', ['path' => $path]);
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // 何もしない
    }
}
