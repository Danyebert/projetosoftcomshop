@extends('layouts.admin-app')

@section('content')

<div class="card">
        <div class="card-header">
            <h5 class="card-title">Listagem de Fornecedores</h5> 
                <div class="float-right">
                    <a href="{{ url("/fornecedores/novo") }}" class="btn btn-primary"><i class="fas fa-plus"></i> Novo Fornecedores</a>
                </div>
        </div>  

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tipo Pessoa</th>
                        <th scope="col">CGC</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Endereço</th>
                        <th scope="col">Bairro</th>
                        <th scope="col">Cidade</th>
                        <th scope="col">UF</th>
                        <th scope="col">Status</th>
                        <th scope="col">Editar/Deletar</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($fornecedores as $fornecedor)
                        <tr>
                            <th scope="row">{!! $fornecedor->id !!}</th>
                            <td>{!! $fornecedor->tipo_pessoa !!}</td>
                            <td>{!! $fornecedor->cgc !!}</td>
                            <td>{!! $fornecedor->nome !!}</td>
                            <td>{!! $fornecedor->endereco !!}</td>
                            <td>{!! $fornecedor->bairro !!}</td>
                            <td>{!! $fornecedor->cidade !!}</td>
                            <td>{!! $fornecedor->uf !!}</td>
                            <td>
                                @if ($fornecedor->ativo == 1)
                                    <span class="badge badge-success">Ativo</span>
                                @else                               
                                    <span class="badge badge-danger">Desativado</span>   
                                @endif
                            </td>
                            <td>
                                <a href="{{ url("/fornecedores/{$fornecedor->id}/editar") }}" class="btn btn-primary btn-sm"><i class="fas fa-pen"></i></a>
                                <a href="{{ url("/fornecedores/{$fornecedor->id}/excluir") }}" class="btn btn-danger btn-sm botao-excluir"><i class="fas fa-trash-alt"></i>
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
                        toastr.success("Sucesso!", "Fornecedor excuido com sucesso!");
                        setTimeout(() => {
                            window.location.reload();
                        },3000);
                        
                        return;
                    }
                    toastr.erro("Erro", "Não foi possivel escluir o Fornecedor.");
                });

                return false;
            })
            
        })
    </script>
@endpush
