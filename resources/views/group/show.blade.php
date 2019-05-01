@extends('templates/master')

@section('conteudo-view')
<header>
    <h1>Nome do grupo: {{$group->name}} </h1>
    <h2>Instituição: {{$group->institution->name}} </h1>
    <h3>Usuário responsável: {{$group->user->name}}
</head>
{!! Form::open(['route' => ['group.user.store', $group->id], 'method' => 'post', 'class' => 'form-padrao']) !!}
@include ('templates.formularios.select', ['label' => 'Usuário',
  'select' => 'user_id',
  'data' => $user_list, 
  'attributes' => ['placeholder' => 'User']])
  @include ('templates.formularios.submit', ['input' => 'Relacionar ao grupo'])
{!! Form::close() !!}   
@include('user.list', ['user_list' => $group->users])
@endsection