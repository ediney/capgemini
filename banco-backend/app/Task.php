<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'agencia',
        'numero',
        'saldo'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function getSaldo()
    {
        return $this->saldo;
    }
}
