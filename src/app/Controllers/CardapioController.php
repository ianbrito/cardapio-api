<?php

namespace Cardapio\App\Controllers;

class CardapioController
{


    public function index($data)
    {
        echo json_encode($data);
    }

    public function store()
    {
        $json = file_get_contents('php://input');
        var_dump($json);
        die();
    }
}