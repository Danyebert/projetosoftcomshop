<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fornecedores extends Model
{
    protected $fillable = [
        'nome',
        'cgc',
        'tipo_pessoa',
        'email',
        'telefone',
        'endereco',
        'bairro',
        'cidade',
        'uf',
        'ativo'
    ];
}
