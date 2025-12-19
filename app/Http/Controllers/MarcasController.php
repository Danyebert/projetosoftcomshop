<?php

namespace App\Http\Controllers;

use App\Http\Requests\MarcasRequest;
use App\Repositories\MarcasRepository;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MarcasController extends Controller
{
    private $repository;

    public function __construct()    
    { 
        $this->repository = new MarcasRepository();
    }

    public function listagem()
    {
        $marcas = $this->repository->listagem();

        return view('marcas.listagem', [
            'marcas'=> $marcas
        ]);
    }
    public function formulario(Request $request, $id = null)
    {
        $marcas = $this->repository->capturar($id);
        
        return view('marcas.formulario',[
            'marcas'=> $marcas
        ]);
    }
    public function salvar(marcasRequest $request)
    {
        $dados = $request->all();
        $marcas = $this->repository->salvar($dados);
        
        Toastr::success("Fabricante cadastrado!", "Sucesso!");
        return redirect()->to(url("/marcas"));


    }

    public function excluir(Request $request, $id)
    {
        $retorno = $this->repository->excluir($id);

        return response()->json([
            "status" => $retorno
        ]);
        
    }
}
