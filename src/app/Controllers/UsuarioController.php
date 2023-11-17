<?php

namespace Cardapio\App\Controllers;

use Cardapio\Database\Repository\UsuarioRepository;

class UsuarioController
{
    private $repository;

    public function __construct()
    {
        $this->repository = new UsuarioRepository();
    }

    public function index()
    {
        $this->repository->all();
        echo 'Usuario';
    }
}