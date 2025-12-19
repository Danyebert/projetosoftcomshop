<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movimentacao extends Model
{
    protected $table = "movimentacao";
    protected $fillable = [
        "produto_id",
        'quantidade',
        'tipo_movimentacao'        
    ];

    public function produto()
    {
        return $this->belongsTo(Produtos::class, 'produto_id');
    }
}