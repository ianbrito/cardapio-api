<?php

namespace Cardapio\App\Controllers;

class CardapioController
{

    public function index()
    {
        // echo json_encode($data);
    }

    public function show($id)
    {
        var_dump($id);
        // echo json_encode($id);
    }

    public function store($id, $request)
    {
        $json = file_get_contents('php://input');
        var_dump($json);
        die();
    }
}