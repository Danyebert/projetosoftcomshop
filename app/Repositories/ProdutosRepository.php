<?php

namespace App\Repositories;
use App\Models\Produtos;
use Illuminate\Http\Request;

class ProdutosRepository
{
    private $model;

    public function __construct()   
    { 
        $this->model = new Produtos();
    }

    public function listagem()
    {
        return $this->model->all();
    }

    public function capturar($id)
    {
        return $this->model->find($id);
    }


    public function salvar($dados): Produtos 
    {
        $id = null;
        $dados['preco_compra'] = str_replace(',', '.', $dados['preco_compra']);
        $dados['preco_venda']  = str_replace(',', '.', $dados['preco_venda']);

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