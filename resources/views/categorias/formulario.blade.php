@extends('layouts.admin-app')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Cadastro de Grupo</h5>
        <div class="float-right">
            <a href="{{ url("/categorias") }}" class="btn btn-dark"><i class="fas fa-arrow-left"></i>Voltar</a>
        </div>
    </div>

    <div class="card-body">

        {!! Form::model($categoria, ['url' => url("/categorias/salvar"), "method" => "POST"]) !!}
        {!! Form::hidden("id") !!}
        <div class="row">
            <div class="col-4">
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
        </div>
        <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Salvar
        </button>
        {!! Form::close() !!}
    </div>
</div>

@endsection