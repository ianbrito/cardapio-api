<?php

namespace Cardapio\Core\Database;

use PDO;
use PDOException;

class DB
{
    private static $instance;

    private function __construct()
    {

    }

    public static function getInstance(): PDO
    {
        if (!isset(self::$instance)) {
            $host = getenv('DB_HOST');
            $port = getenv('DB_PORT');
            $database = getenv('DB_DATABASE');
            $user = getenv('DB_USERNAME');
            $password = getenv('DB_PASSWORD');

            try {
                self::$instance = new PDO(
                    "pgsql:host={$host};port={$port};dbname={$database}",
                    $user,
                    $password
                );
            } catch (PDOException $e) {
                exit($e->getMessage());
            }
        }
        return self::$instance;
    }
}