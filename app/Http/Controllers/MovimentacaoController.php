<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovimentacaoRequest;
use App\Http\Requests\ProdutosRequest;
use App\Models\Categorias;
use App\Models\Fornecedores;
use App\Models\Marcas;
use App\Repositories\ProdutosRepository;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Repositories\MovimentacaoRepository;
use App\Models\Produtos;

class MovimentacaoController extends Controller
{
    private $repository;

    public function __construct()    
    { 
        $this->repository = new MovimentacaoRepository();
    }

    public function listagem()
    {
        $movimentacoes= $this->repository->listagem();
    
        return view('movimentacao.listagem', [
            'movimentacoes'=> $movimentacoes
        ]);
    }
    public function formulario(Request $request, $id = null)
    {
        
        $produtos = Produtos::orderby('nome')->get();
        return view('movimentacao.formulario', compact('produtos'));

    
    }
    public function salvar(MovimentacaoRequest $request)
    {
        $dados = $request->all();

        $this->repository->salvar($request->all());
        
        Toastr::success("movimentacao cadastrado!", "Sucesso!");
        return redirect()->to(url("/movimentacao"));


    }

    public function excluir(Request $request, $id)
    {
        $retorno = $this->repository->excluir($id);

        return response()->json([
            "status" => $retorno
        ]);
        
    }

    
}