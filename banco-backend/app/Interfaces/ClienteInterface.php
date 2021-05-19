<?php

namespace App\Interfaces;

interface ClienteInterface
{
    public function pesquisar($id);

    public function pesquisarPor($coluna, $termo);
}
