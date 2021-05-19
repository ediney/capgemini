<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'nome',
        'cpf'
    ];

    public function pesquisaNome($name = null)
    {
        if (!$name)
            return $this->get();
        return $this->where('nome', 'LIKE', "%{$name}%")->get();
    }

    public function contas()
    {
        return $this->hasMany(Conta::class);
    }
}
