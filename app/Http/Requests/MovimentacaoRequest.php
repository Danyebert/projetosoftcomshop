<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovimentacaoRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "produto_id"=> "required|exists:produtos,id",
            'tipo_movimentacao' => 'required|in:ENTRADA,SAIDA',
            'quantidade' => 'required|numeric'

        ];
    }
}