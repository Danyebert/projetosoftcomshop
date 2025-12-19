@extends('layouts.admin-app')

@section('content')

<div class="card">
        <div class="card-header">
            <h5 class="card-title">Listagem de Grupo</h5> 
                <div class="float-right">
                    <a href="{{ url("/categorias/novo") }}" class="btn btn-primary"><i class="fas fa-plus"></i>Novo Grupo</a>
                </div>
        </div>  

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Status</th>
                        <th scope="col">Editar/Excluir</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($categorias as $categoria)
                        <tr>
                            <th scope="row">{!! $categoria->id !!}</th>
                            <td>{!! $categoria->nome !!}</td>
                            <td>
                                @if ($categoria->ativo == 1)
                                    <span class="badge badge-success">Ativo</span>
                                @else                               
                                    <span class="badge badge-danger">Desativado</span>   
                                @endif
                            </td>
                            <td>
                                <a href="{{ url("/categorias/{$categoria->id}/editar") }}" class="btn btn-primary btn-sm"><i class="fas fa-pen"></i></a>
                                <a href="{{ url("/categorias/{$categoria->id}/excluir") }}" class="btn btn-danger btn-sm botao-excluir"><i class="fas fa-trash-alt"></i>
                            </td>
                        </tr>
                    @endforeach
                    

                </tbody>
            </table>
           
        </div>
</div>


@endsection

@push("js")
    <script>
        $(document).ready(() => {
            $(".botao-excluir").on("click", (event) => {
                event.preventDefault();

                const url = $(event.currentTarget).attr("href");         
                fetch(url, {
                    method: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": csrfToken
                    }
                }).then(async (retorno) => {                    
                    const dados = await retorno.json();
                    
                    if (dados.status === true){
                        toastr.success("Sucesso!", "Grupo excuido com sucesso!");
                        setTimeout(() => {
                            window.location.reload();
                        },3000);
                        
                        return;
                    }
                    toastr.erro("Erro", "Não foi possivel excluir o grupo.");
                });

                return false;
            })
            
        })
    </script>
@endpush
