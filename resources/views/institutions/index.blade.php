@extends('templates.master')
@section('css-view') 

@endsection

@section('js-view') 

@endsection
@section('conteudo-view')
@if(session('success'))
<h3>{{session('success')['messages']}}</h3>
@endif
{!! Form::open(['route' => 'institution.store', 'method' => 'post', 'class' => 'form-padrao']) !!}
@include ('templates.formularios.input',['label' => 'Nome', 'input' => 'name', 'attributes' => ['placeholder' => 'Nome']])
@include ('templates.formularios.submit', ['input' => 'Cadastrar'])
{!! Form::close() !!}

<table class="default-table">
<thead>
<tr>
<td>#</td>
<td>Nome da Instituição</td>
<td>Opções</td>
</tr>
</thead>

<tbody>
@foreach($institution as $inst)
<tr>
<td>{{ $inst->id }} </td>
<td>{{ $inst->name }} </td>
<td>{!! Form::open(['route' => ['institution.destroy', $inst->id], 'method' => 'delete']) !!}
{!! Form::submit("Remover") !!}
{!! Form::close() !!}
<a href="{{ route('institution.show', $inst->id) }}">Detalhes</a> |
<a href="{{ route('institution.edit', $inst->id)}}"> Editar</a>
<a href="{{ route('institution.product.index', $inst->id)}}"> Produtos</a>
</td>
</tr>
@endforeach
</tbody>
</table>

@endsection