<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    protected $fillable = [
        'nome',
        'barras',
        'referencia',
        'medida',
        'categoria_id',
        'marca_id',
        'fornecedor_id',
        'preco_compra',
        'preco_venda',
        'estoque',
        'ativo'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categorias::class, 'categoria_id', 'id');
    }

    public function marca()
    {
        return $this->belongsTo(Marcas::class,'marca_id', 'id');
    }
    public function fornecedor()
    {
        return $this->belongsTo(Fornecedores::class,'fornecedor_id','id');
    }
    
}
