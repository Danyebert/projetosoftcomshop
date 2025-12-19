<?php

namespace App\Repositories;
use App\Models\Movimentacao;
use Illuminate\Http\Request;
use App\Models\Produtos;
use Illuminate\Support\Facades\DB;

class MovimentacaoRepository
{
    private $model;

    public function __construct()   
    { 
        $this->model = new movimentacao();
    }

    public function listagem()
    {
        return $this->model->all();
    }

    public function capturar($id)
    {
        return $this->model->find($id);
    }


    public function salvar($dados)
    {
        return DB::transaction(function () use ($dados) {
            $movimentacao = Movimentacao::create($dados);
           
            $produto = Produtos::findOrFail($dados['produto_id']);

            if ($dados['tipo_movimentacao'] === 'ENTRADA') {
                $produto->estoque += $dados['quantidade'];
            } else {
            
                if ($produto->estoque < $dados['quantidade']) {
                    throw new \Exception('Estoque insuficiente');
                }

                $produto->estoque -= $dados['quantidade'];
            }

            return $produto->save();
        });
    }

    
    

    public function excluir($id)
    {
        $model = $this->model->find($id);
        $model->delete();
        return true;
    }

}