@extends('templates.master')
@section('conteudo-view')
@if(session('success'))
<h3>{{session('success')['messages']}}</h3>
@endif
{!! Form::open(['route' => ['institution.product.store', $institution->id], 'method' => 'post', 'class' => 'form-padrao']) !!}
@include ('templates.formularios.input',['label' => 'Nome', 'input' => 'name'])
@include ('templates.formularios.input',['label' => 'Descrição', 'input' => 'description'])
@include ('templates.formularios.input',['label' => 'Indexador', 'input' => 'index'])
@include ('templates.formularios.input',['label' => 'Taxa de Juros', 'input' => 'interest_rate'])
@include ('templates.formularios.submit', ['input' => 'Cadastrar Produto'])
{!! Form::close() !!}
<table class="default-table">
<thead><tr>
<td>#</td>
<td>Nome</td>
<td>Descrição</td>
<td>Indexador</td>
<td>Taxa juros %</td>
<td>Opções</td>
</thead></tr>
<tbody>
@forelse($institution->products as $product)
<tr>
<td>{{$product->id }} </td>
<td>{{$product->name }}</td>
<td>{{$product->description }}</td>
<td>{{$product->index }}</td>
<td>{{$product->interest_rate }}</td>
<td>{!! Form::open(['route' => ['institution.product.destroy', $institution->id ,$product->id], 'method' => 'delete']) !!}
{!! Form::submit("Remover") !!}
{!! Form::close() !!}

<a href="">Editar</a>
</td>

</tr>
@empty
<tr>
<td>Nada cadastrado</td>
</tr>
@endforelse
</tbody>

</table>

@endsection