<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriasRequest;
use App\Repositories\CategoriasRepository;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoriasController extends Controller
{
    private $repository;

    public function __construct()    
    { 
        $this->repository = new CategoriasRepository();
    }

    public function listagem()
    {
        $categorias = $this->repository->listagem();

        return view('categorias.listagem', [
            'categorias'=> $categorias
        ]);
    }
    public function formulario(Request $request, $id = null)
    {
        $categorias = $this->repository->capturar($id);
        
        return view('categorias.formulario',[
            'categoria'=> $categorias
        ]);
    }
    public function salvar(CategoriasRequest $request)
    {
        $dados = $request->all();
        $categorias = $this->repository->salvar($dados);
        
        Toastr::success("Categorias cadastrado!", "Sucesso!");
        return redirect()->to(url("/categorias"));


    }

    public function excluir(Request $request, $id)
    {
        $retorno = $this->repository->excluir($id);

        return response()->json([
            "status" => $retorno
        ]);
        
    }
}
