<?php
namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Admin implements FilterInterface{

    public function before(RequestInterface $request, $arguments = null){
        if(!session()->get('LOGGED') && session()->get('NOMBRE') != 'admin'){
            return redirect()->to('/login');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null){

    }

}
