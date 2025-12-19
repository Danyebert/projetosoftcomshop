<?php

namespace App\Repositories;

use App\Models\Categorias;
use Illuminate\Http\Request;

class CategoriasRepository
{
    private $model;

    public function __construct()   
    { 
        $this->model = new Categorias();
    }

    public function listagem()
    {
        return $this->model->all();
    }

    public function capturar($id)
    {
        return $this->model->find($id);
    }


    public function salvar($dados): Categorias 
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