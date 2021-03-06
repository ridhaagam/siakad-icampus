<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (session()->get('log') == '') {
            session()->setFlashdata('alert', 'Maaf, Anda harus Log in Terlebih Dahulu!');
            return redirect()->to(base_url('auth'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        if (session()->get('log') == 1) {
            return redirect()->to(base_url('admin'));
        }
    }
}
