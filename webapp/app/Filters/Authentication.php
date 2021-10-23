<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Authentication implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $isLogin = session('isLogin');

        if ($isLogin === true) {
            log_message('debug', 'ログイン済みユーザーです id:{}', ['id' => session('id')]);
            return;
        }

        log_message('debug', '未ログインユーザーです');
        return redirect()->redirect('/login');
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // 何もしない
    }

}
