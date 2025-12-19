<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutosRequest;
use App\Models\Categorias;
use App\Models\Fornecedores;
use App\Models\Marcas;
use App\Repositories\ProdutosRepository;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProdutosController extends Controller
{
    private $repository;

    public function __construct()    
    { 
        $this->repository = new ProdutosRepository();
    }

    public function listagem()
    {
        $produtos = $this->repository->listagem();
    
        return view('produtos.listagem', [
            'produtos'=> $produtos
        ]);
    }
    public function formulario(Request $request, $id = null)
    {
        
        $produtos = $this->repository->capturar($id);

        $categorias = Categorias::all();
        $marcas = Marcas::all();
        $fornecedores = Fornecedores::all();

        return view('produtos.formulario',[
            'produto'=> $produtos,
            'categorias' => $categorias,
            'marcas'=> $marcas,
            'fornecedores'=> $fornecedores
        ]);
    }
    public function salvar(ProdutosRequest $request)
    {
        
        $dados = $request->all();
        $dados['preco_compra'] = str_replace(',', '.', $dados['preco_compra']);
        $dados['preco_venda']  = str_replace(',', '.', $dados['preco_venda']);
        $dados['estoque']  = str_replace(',', '.', $dados['estoque']);
        
        $produtos = $this->repository->salvar($dados);
       
       
        
        Toastr::success("Produto cadastrado!", "Sucesso!");
        return redirect()->to(url("/produtos"));


    }

    public function excluir(Request $request, $id)
    {
        $retorno = $this->repository->excluir($id);

        return response()->json([
            "status" => $retorno
        ]);
        
    }

    
}
