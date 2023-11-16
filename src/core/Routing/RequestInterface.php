<?php

namespace Cardapio\Core\Routing;

interface RequestInterface
{
    public function getPath(): string;

    public function getMethod(): string;
}