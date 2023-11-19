<?php

namespace Cardapio\Database\Repository;

use Cardapio\Core\Database\DB;
use Cardapio\Core\Database\Repository\RepositoryInterface;
use PDO;

class LojaRepository implements RepositoryInterface
{
    private $db;

    public function __construct()
    {
        $this->db = DB::getInstance();
    }

    public function create($data): mixed
    {
        $sql = "INSERT INTO lojas (nome) VALUES (:nome)";
        $stmt = $this->db->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
        $stmt->bindValue(':nome', $data->nome, PDO::PARAM_STR);
        $stmt->execute();
        $id = $this->db->lastInsertId();
        $created = $this->findById($id);
        return $created;
    }

    public function findById($id): mixed
    {
        $sql = "SELECT id, nome FROM lojas WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function all(): mixed
    {
        $sql = "SELECT id, nome FROM lojas";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
