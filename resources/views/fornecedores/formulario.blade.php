@extends('layouts.admin-app')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Cadastro de Fornecedores</h5>
        <div class="float-right">
            <a href="{{ url("/fornecedores") }}" class="btn btn-dark"><i class="fas fa-arrow-left"></i>Voltar</a>
        </div>
    </div>
    <div class="card-body">
        {!! Form::model($fornecedor, ['url' => url("/fornecedores/salvar"), "method" => "POST"]) !!}
        {!! Form::hidden("id") !!}
        <div class="row">
            <div class="col-1">
                <div class="form-group">
                    {!! Form::label('tipo_pessoa', 'Tipo Pessoa') !!}
                    {!! Form::select('tipo_pessoa', ['F' => 'F', 'J' => 'J'], null, ['class'=> 'form-control']) !!}
                </div>
            </div>
            <div class="col-5">
                <div class="form-group">
                    {!! Form::label('cgc', 'CPF/CNPJ') !!}
                    {!! Form::text('cgc', null, ["class" => "form-control", 'maxlength'=>'14', 'placeholder' => "CNPJ ou CPF", 'required'=>true]) !!}
                    @error("cgc")
                    <span class="text-danger">
                        {!! $message !!}
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    {!! Form::label('nome', 'Razao Social') !!}
                    {!! Form::text('nome', null, ["class" => "form-control", 'required'=>true]) !!}
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    {!! Form::label('endereco', 'Endereço') !!}
                    {!! Form::text('endereco', null, ["class" => "form-control"]) !!}
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    {!! Form::label('bairro', 'Bairro') !!}
                    {!! Form::text('bairro', null, ["class" => "form-control"]) !!}
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    {!! Form::label('cidade', 'Cidade') !!}
                    {!! Form::text('cidade', null, ["class" => "form-control"]) !!}
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    {!! Form::label('uf', 'UF') !!}
                    {!! Form::text('uf', null, ["class" => "form-control"]) !!}
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::text('email', null, ["class" => "form-control"]) !!}
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Salvar
        </button>
        {!! Form::close() !!}
    </div>
</div>

@endsection