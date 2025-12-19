@extends('layouts.admin-app')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Cadastro de Movimentação</h5>
        <div class="float-right">
            <a href="{{ url("/movimentacao") }}" class="btn btn-dark"><i class="fas fa-arrow-left"></i>Voltar</a>
        </div>
    </div>

    <div class="card-body">

        {!! Form::open(['url' => url('/movimentacao/salvar'), 'method' => 'POST']) !!}

        <div class="row">
            <div class="col-8">
                <div class="form-group">
                    {!! Form::label('produto_id', 'Produto') !!}
                    <select name="produto_id" class="form-control" required>
                        <option value="">Selecione</option>
                        @foreach($produtos as $produto)
                        <option value="{{ $produto->id }}">
                            {{ $produto->nome }} (Estoque: {{ $produto->estoque }})
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    {!! Form::label('tipo_movimentacao', 'Tipo') !!}
                    {!! Form::select('tipo_movimentacao', ['ENTRADA' => 'ENTRADA', 'SAIDA' => 'SAÍDA'], null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-6">
                    {!! Form::label('quantidade', 'Quantidade') !!}
                    {!! Form::number('quantidade', null, ['class' => 'form-control', 'required'=>true, 'min' => 1]) !!}
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success">
            <i class="fas fa-check"></i>Salvar
        </button>
        {!! Form::close() !!}
    </div>
</div>
@endsection