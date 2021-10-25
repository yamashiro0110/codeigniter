<?php

namespace App\Controllers;

use App\Helpers\LoginSessionHelper;
use App\Helpers\ControllerHelper;

class Login extends BaseController
{
    use LoginSessionHelper, ControllerHelper;

    public function index()
    {
        echo view('template/header');
        echo view('login/form');
        echo view('template/footer');
    }

    public function login()
    {
        # リクエストパラメータを取得
        $id = $this->requestParam('id');
        $password = $this->requestParam('password');

        if ($id !== 'yamashiro0110' || $password !== 'test') {
            log_message('debug', 'ログイン認証に失敗しました');
            echo view('template/header');
            echo view('login/error');
            echo view('template/footer');
            return;
        }

        log_message('debug', 'ログイン認証に成功しました id:{id}', ['id' => $id]);

        session_regenerate_id();
        $session = session(); // セッションを取得
        $session->set('userId', $id);
        $session->set('isLogin', true);

        $uri = $this->retrieveLoginAfterUri();
        log_message('debug', 'ログイン後のURIにリダイレクトします uri:{uri}', ['uri' => $uri]);

        return redirect()->redirect($uri);
    }

    public function logout()
    {
        log_message('debug', 'ログアウトします id:{id}', ['id' => session('userId')]);
        session_destroy();
        return redirect()->redirect('/login');
    }

}
