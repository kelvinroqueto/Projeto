@extends('templates.master')

@section('css-view') 

@endsection

@section('js-view') 

@endsection


@section('conteudo-view') 

@if(session('success'))
<h3>{{session('success')['messages']}}</h3>
@endif
{!! Form::open(['route' => 'user.store', 'method' => 'post', 'class' => 'form-padrao']) !!}
@include ('templates.formularios.input', ['input' => 'cpf', 'attributes' => ['placeholder' => 'CPF']])
@include ('templates.formularios.input', ['input' => 'name', 'attributes' => ['placeholder' => 'Nome']])
@include ('templates.formularios.input', ['input' => 'phone', 'attributes' => ['placeholder' => 'Telefone']])
@include ('templates.formularios.input', ['input' => 'email', 'attributes' => ['placeholder' => 'Email']])
@include ('templates.formularios.password', ['input' => 'password', 'attributes' => ['placeholder' => 'Senha']])
@include ('templates.formularios.submit', ['input' => 'Cadastrar'])
{!! Form::close() !!}

@include('user.list', ['user_list' => $usuario])

@endsection

