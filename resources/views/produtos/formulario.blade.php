@extends('layouts.admin-app')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Cadastro de Mercadorias</h5>
        <div class="float-right">
            <a href="{{ url("/produtos") }}" class="btn btn-dark"><i class="fas fa-arrow-left"></i>Voltar</a>
        </div>
    </div>

    <div class="card-body">
        {!! Form::model($produto, ['url' => url("/produtos/salvar"), "method" => "POST"]) !!}
        {!! Form::hidden("id") !!}
        <div class="row">
            <div class="col-3">
                <div class="form-group">
                    {!! Form::label('referencia', 'Referencia') !!}
                    {!! Form::text('referencia', null, ["class" => "form-control"]) !!}
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    {!! Form::label('barras', 'Cod Barras') !!}
                    {!! Form::text('barras', null, ["class" => "form-control"]) !!}
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    {!! Form::label('nome', '*Descrição') !!}
                    {!! Form::text('nome', null, ["class" => "form-control", 'required'=>true]) !!} 
                    @error("nome")
                    <span class="text-danger">
                        {!! $message !!}
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-1">
                <div class="form-group">
                    {!! Form::label('medida', 'Medida') !!}
                    {!! Form::text('medida', null, ["class" => "form-control", 'required'=>true]) !!}
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    {!! Form::label('categoria_id', '*Grupo') !!}
                    {!! Form::select('categoria_id', $categorias->pluck('nome', 'id')->toArray(), null, ["class" => "form-control", "placeholder" => "Selecione", 'required'=>true]) !!}
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    {!! Form::label('marca_id', 'Marca') !!}
                    {!! Form::select('marca_id', $marcas->pluck('nome', 'id')->toArray(), null, ["class" => "form-control", "placeholder" => "Selecione", 'required'=>true]) !!}
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    {!! Form::label('fornecedor_id', 'Fornecedor') !!}
                    {!! Form::select('fornecedor_id', $fornecedores->pluck('nome', 'id')->toArray(), null, ["class" => "form-control", "placeholder" => "Selecione", 'required'=>true]) !!}
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    {!! Form::label('preco_compra', 'Preço de Compra') !!}
                    {!! Form::text('preco_compra', null, ["class" => "form-control", 'required'=>true]) !!}
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    {!! Form::label('preco_venda', 'Preço de Venda') !!}
                    {!! Form::text('preco_venda', null, ["class" => "form-control", 'required'=>true]) !!}
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    {!! Form::label('estoque', 'Unidades em Estoque') !!}
                    {!! Form::text('estoque', null, ["class" => "form-control", 'required'=>true]) !!}
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Salvar
        </button>
        {!! Form::close() !!}
    </div>
</div>

@endsection