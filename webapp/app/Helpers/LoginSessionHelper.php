<?php

namespace App\Helpers;

trait LoginSessionHelper
{
    /**
     * sessionにREQUEST_URIを保存
     *
     * @return void
     */
    public function saveRequestUri()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $session = session();
        $session->set('requestUri', $uri);
        log_message('debug', 'リクエストされたURIをsessionに保存しました uri:{uri}',['uri' => $uri]);
    }

    /**
     * sessionに保存されているREQUEST_URIを取得
     *
     * 未ログイン時にログインページにリダイレクトされた場合、ログインより前にアクセスしたURIが保存されている
     *
     * @return string
     */
    public function retrieveSavedRequestUri()
    {
        $uri = session('requestUri');
        log_message('debug', 'sessionに保存されているURIを取得しました uri:{uri}', ['uri' => $uri]);
        return $uri;
    }

    /**
     * ログイン後にリダイレクトするURIを取得
     *
     * @return string
     */
    public function retrieveLoginAfterUri(string $uri = '/account')
    {
        $savedRequestUri = $this->retrieveSavedRequestUri();
        log_message('debug', 'ログイン後にリダイレクトするURIを取得しました savedRequestUri:{savedRequestUri} uri:{uri}',
            ['savedRequestUri' => $savedRequestUri, 'uri' => $uri]);

        if ($savedRequestUri === '/login') {
            log_message('debug', '/loginの場合は指定されたURIを返します {uri}', ['uri' => $uri]);
            return $uri;
        }

        if ($savedRequestUri === '' || is_null($savedRequestUri)) {
            log_message('debug', 'ログイン前のURIが存在しない場合は指定されたURIを返します {uri}', ['uri' => $uri]);
            return $uri;
        }

        log_message('debug', 'sessionに保存されたURIを返します {uri}', ['uri' => $savedRequestUri]);
        return $savedRequestUri;
    }

}
