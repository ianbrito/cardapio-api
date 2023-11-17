<?php

namespace Cardapio\App\Controllers;

use Cardapio\Database\Repository\LojaRepository;

class LojaController
{
    private $repository;

    public function __construct()
    {
        $this->repository = new LojaRepository();
    }

    public function index()
    {
        $data = $this->repository->all();
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = json_encode($data);
        echo $response['body'];
    }
}