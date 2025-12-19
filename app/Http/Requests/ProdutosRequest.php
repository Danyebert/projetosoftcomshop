<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutosRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
        "nome"=> "required",
        'categoria_id'=> 'required|exists:categorias,id',
        'marca_id'=> 'required|exists:marcas,id',
        'fornecedor_id'=> 'required|exists:fornecedores,id',
        'preco_compra'=> 'required|numeric|min:0',
        'preco_venda'=> 'required|numeric|min:0',
        'estoque'=> 'required|numeric|min:0',
        ];
    }
}
