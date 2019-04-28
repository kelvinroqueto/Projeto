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

<table class="default-table">
<thead>
<tr>
<td>ID</td>
<td>CPF</td>
<td>Nome</td>
<td>Telefone</td>
<td>Data Nasc.</td>
<td>E-mail</td>
<td>Status</td>
<td>Permissão</td>
<td> MENU</td>

</tr>
</thead>
<tbody>
@foreach($usuario as $user)
<tr>
<td>{{ $user->id }}</td>
<td>{{ $user->cpf }}</td>
<td>{{ $user->name }}</td>
<td>{{ $user->phone }}</td>
<td>{{ $user->birth }}</td>
<td>{{ $user->email }}</td>
<td>{{ $user->status }}</td>
<td>{{ $user->permission }}</td>
<td>{!! Form::open(['route' => ['user.destroy', $user->id], 'method' => 'DELETE']) !!} 
{!! Form::submit('Remover') !!}
{!! Form::close() !!} 
</td>
</tr>
@endforeach
</tbody>



</table>

@endsection

