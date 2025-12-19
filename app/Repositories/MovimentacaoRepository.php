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
        return DB::transaction(function () use ($id) {
            $movimentacao = $this->model->findOrFail($id);
            $produto = Produtos::findOrFail($movimentacao->produto_id);
            if ($movimentacao->tipo_movimentacao === 'ENTRADA') {
                if ($produto->estoque < $movimentacao->quantidade) {
                    throw new \Exception(
                        'Não é possível excluir esta entrada, pois o estoque atual é menor que a quantidade lançada.'
                    );
                }
                $produto->estoque -= $movimentacao->quantidade;
            } else {
                $produto->estoque += $movimentacao->quantidade;
            }
            $produto->save();

            $movimentacao->delete();

            return true;
        });
    }
}
