<?php

namespace App\Http\Controllers;

use App\Http\Requests\FornecedoresRequest;
use App\Repositories\FornecedoresRepository;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FornecedoresController extends Controller
{
    private $repository;

    public function __construct()    
    { 
        $this->repository = new FornecedoresRepository();
    }

    public function listagem()
    {
        $fornecedores = $this->repository->listagem();

        return view('fornecedores.listagem', [
            'fornecedores'=> $fornecedores
        ]);
    }
    public function formulario(Request $request, $id = null)
    {
        $fornecedores = $this->repository->capturar($id);
        
        return view('fornecedores.formulario',[
            'fornecedor'=> $fornecedores
        ]);
    }
    public function salvar(FornecedoresRequest $request)
    {
        $dados = $request->all();
        $fornecedores = $this->repository->salvar($dados);
        
        Toastr::success("Fornecedor cadastrado!", "Sucesso!");
        return redirect()->to(url("/fornecedores"));


    }

    public function excluir(Request $request, $id)
    {
        $retorno = $this->repository->excluir($id);

        return response()->json([
            "status" => $retorno
        ]);
        
    }
}
