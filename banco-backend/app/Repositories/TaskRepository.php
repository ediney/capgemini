<?php

namespace App\Repositories;

use App\Task;

class TaskRepository
{
    protected $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    public function find($id)
    {
        return $this->task->find($id);
    }

    public function show($numeroConta)
    {
        $task = $this->task->with('cliente')->where('numero', '=', $numeroConta)->first();

        if (!$task)
                return response()->json(['message' => 'Nenhuma conta encontrada!', 'error' => false], 404);
        return response()->json($task);
    }

    public function all()
    {
        return $this->task->all();
    }

    public function getBalance($id)
    {

        return $this->conta->where('id', $id)
            ->select('saldo')
            ->get();
    }

    public function sacar($numeroConta, $valor)
    {
        $task = $this->task->with('cliente')->where('numero', '=', $numeroConta)->first();

        if (!$task)
            return response()->json(['message' => 'Nenhuma conta encontrada!', 'error' => false], 404);

        if ($valor <= 0 || !isset($valor))
            return response()->json(['message' => 'O valor não por ser menor ou igual ZERO!', 'error' => false], 404);

        if ($task->saldo < $valor) {
            return response()->json(['message' => 'Seu saldo é insuficiente, tente outro valor,', 'error' => false], 404);
        } else {

            $task->update([
                'saldo' => $task->saldo - $valor
            ]);

            return response()->json($task);
        }
    }

    public function depositar($numeroConta, $valor)
    {
        $task = $this->task->with('cliente')->where('numero', '=', $numeroConta)->first();

        if (!$task)
            return response()->json(['message' => 'Nenhuma conta encontrada!', 'error' => false], 404);

        if ($valor <= 0 || !isset($valor)) {
            return response()->json(['message' => 'O valor não por ser menor ou igual a zero!', 'error' => false], 404);
        } else {

            $task->update([
                'saldo' => $task->saldo + $valor
            ]);

            return response()->json($task);
        }
    }
}
