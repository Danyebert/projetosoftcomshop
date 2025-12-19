@extends('layouts.admin-app')

@section('content')

<div class="card">
    <div class="card-header">
        <h5 class="card-title">Listagem de Mercadorias</h5>
        <div class="float-right">
            <a href="{{ url("/produtos/novo") }}" class="btn btn-primary"><i class="fas fa-plus"></i> Nova Mercadoria</a>
        </div>
    </div>

    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Barras</th>
                    <th scope="col">Referencia</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Medida</th>
                    <th scope="col">Grupo</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Fornecedor</th>
                    <th scope="col">Preço de Compra</th>
                    <th scope="col">Preço de Venda</th>
                    <th scope="col">Estoque</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>

                </tr>
            </thead>
            <tbody>
                @foreach ($produtos as $produto)
                <tr>
                    <th scope="row">{!! $produto->id !!}</th>
                    <td>{!! $produto->barras !!}</td>
                    <td>{!! $produto->referencia !!}</td>
                    <td>{!! $produto->nome !!}</td>
                    <td>{!! $produto->medida !!}</td>
                    <td>{!! $produto->categoria->nome !!}</td>
                    <td>{!! $produto->marca->nome !!}</td>
                    <td>{!! $produto->fornecedor->nome !!}</td>
                    <td>{!! number_format($produto->preco_compra,2,',','.') !!}</td>
                    <td>{!! number_format($produto->preco_venda, 2, ',', '.') !!}</td>
                    <td>{!! number_format($produto->estoque, 2, ',', '.') !!}</td>
                    <td>
                        @if ($produto->ativo == 1)
                        <span class="badge badge-success">Ativo</span>
                        @else
                        <span class="badge badge-danger">Desativado</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ url("/produtos/{$produto->id}/editar") }}" class="btn btn-primary btn-sm"><i class="fas fa-pen"></i></a>
                        <a href="{{ url("/produtos/{$produto->id}/excluir") }}" class="btn btn-danger btn-sm botao-excluir"><i class="fas fa-trash-alt"></i>
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

                if (dados.status === true) {
                    toastr.success("Sucesso!", "Produto excuido com sucesso!");
                    setTimeout(() => {
                        window.location.reload();
                    }, 3000);

                    return;
                }
                toastr.erro("Erro", "Não foi possivel escluir o produto.");
            });

            return false;
        })

    })
</script>
@endpush