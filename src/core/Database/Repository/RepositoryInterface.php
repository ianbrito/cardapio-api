<?php

namespace Cardapio\Core\Database\Repository;

interface RepositoryInterface
{
    public function __construct();

    public function create($data): mixed;

    public function find($id): mixed;

    public function all(): mixed;

}