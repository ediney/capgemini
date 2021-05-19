<?php

namespace App\Interfaces;

interface TaskInterface
{
    public function find();

    public function sacar($numeroConta, $valor);

    public function depositar($numeroConta, $valor);
}
