@extends('templates.master')

@section('conteudo-view')
@if(session('success'))
<h3>{{session('success')['messages']}}</h3>
@endif
{!! Form::open(['route' => 'moviments.getback.store', 'method' => 'post', 'class' => 'form-padrao']) !!}
@include ('templates.formularios.input', ['label' => 'Valor', 'input' => 'value'])
@include ('templates.formularios.select', ['label' => 'Produto', 'select' => 'product_id', 'data' => $product_list ?? []])
@include ('templates.formularios.select', ['label' => 'Grupo', 'select' => 'group_id', 'data' => $group_list ?? []])
@include ('templates.formularios.submit', ['input' => 'Cadastrar'])
{!! Form::close() !!}

@endsection