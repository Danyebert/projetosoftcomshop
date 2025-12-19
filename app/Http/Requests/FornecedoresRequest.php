<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FornecedoresRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "nome"=> "required",
            "tipo_pessoa" => "required|in:J,F",
            "cgc" => "required|max:14",
            "email" => "required|email"

        ];
    }
}
