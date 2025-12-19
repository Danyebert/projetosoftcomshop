@extends('layouts.admin-app')

@section('content')

<div class="card">
    <div class="card-header">
        <h5 class="card-title">Listagem de Movimentações</h5>
        <div class="float-right">
            <a href="{{ url("/movimentacao/novo") }}" class="btn btn-primary"><i class="fas fa-plus"></i> Nova Movimentação</a>
        </div>
    </div>

    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Codigo Produto</th>
                    <th scope="col">Produto</th>
                    <th scope="col">Tipo Movimentacao</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col"></th>

                </tr>
            </thead>
            <tbody>
                @foreach ($movimentacoes as $mov)
                <tr>
                    <th scope="row">{!! $mov->id !!}</th>
                    <td>{!! $mov->produto->id !!}</td>
                    <td>{!! $mov->produto->nome !!}</td>
                    <td>
                        @if ($mov->tipo_movimentacao == 'ENTRADA')
                        <span class="badge badge-success">
                            <i class="fas fa-arrow-up"></i> ENTRADA
                        </span>
                        @else
                        <span class="badge badge-danger">
                            <i class="fas fa-arrow-down"></i> SAÍDA
                        </span>
                        @endif
                    </td>

                    <td>{!! $mov->quantidade !!}</td>
                    <td>
                        <a href="{{ url("/movimentacao/{$mov->id}/editar") }}" class="btn btn-primary btn-sm"><i class="fas fa-pen"></i></a>
                        <a href="{{ url("/movimentacao/{$mov->id}/excluir") }}" class="btn btn-danger btn-sm botao-excluir"><i class="fas fa-trash-alt"></i>
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