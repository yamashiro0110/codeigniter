<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        echo view('template/header');
        echo view('login/form');
        echo view('template/footer');
    }

    public function login()
    {
        # リクエストパラメータを取得
        $id = $this->request->getVar('id');
        $password = $this->request->getVar('password');

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
        return redirect()->redirect('/account');
    }

    public function logout()
    {
        log_message('debug', 'ログアウトします id:{id}', ['id' => session('userId')]);
        session_destroy();
        return redirect()->redirect('/login');
    }

}
