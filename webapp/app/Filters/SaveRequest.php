<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use App\Helpers\LoginSessionHelper;

class SaveRequest implements FilterInterface
{
    use LoginSessionHelper;

    public function before(RequestInterface $request, $arguments = null)
    {
        $this->saveRequestUri();
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // 何もしない
    }
}
