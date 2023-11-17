<?php

namespace Cardapio\Database\Repository;

use Cardapio\Core\Database\DB;
use Cardapio\Core\Database\Repository\RepositoryInterface;

class UsuarioRepository implements RepositoryInterface
{
    private $db;

    public function __construct()
    {
        $this->db = DB::getInstance();
    }

    public function create($data): mixed
    {
        // TODO: Implement create() method.
        return null;
    }

    public function find($id): mixed
    {
        // TODO: Implement find() method.
        return null;
    }

    public function all(): mixed
    {
        $stmt = "SELECT * FROM usuarios";
        $st = $this->db->query($stmt);
        $result = $st->fetchAll();
        var_dump($result);
        return null;
    }
}