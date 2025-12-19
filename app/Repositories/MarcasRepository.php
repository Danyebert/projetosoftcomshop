<?php

namespace App\Repositories;

use App\Models\Marcas;
use Illuminate\Http\Request;

class MarcasRepository
{
    private $model;

    public function __construct()   
    { 
        $this->model = new Marcas();
    }

    public function listagem()
    {
        return $this->model->all();
    }

    public function capturar($id)
    {
        return $this->model->find($id);
    }


    public function salvar($dados): Marcas 
    {
        $id = null;

        if (isset($dados['id'])) {
            $id = $dados['id'];
        }

        $model = $this->model->findOrNew($id);
        $model->fill($dados);  
        $model->save();

        return $model;
    }

    public function excluir($id)
    {
        $model = $this->model->find($id);
        $model->delete();
        return true;
    }

}