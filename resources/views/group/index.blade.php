@extends ('templates/master')

@section('conteudo-view')

{!! Form::open(['route' => 'group.store', 'method' => 'post', 'class' => 'form-padrao']) !!}
@include ('templates.formularios.input', ['label' => 'Nome do grupo', 'input' => 'name', 'attributes' => ['placeholder' => 'Nome do grupo']])
@include ('templates.formularios.select', ['label' => 'User', 'select' => 'user_id', 'data' => $user_list, 'attributes' => ['placeholder' => 'User']])
@include ('templates.formularios.select', ['label' => 'Instituição', 'select' => 'institution_id', 'data' => $institution_list, 'attributes' => ['placeholder' => 'Instituição']])
@include ('templates.formularios.submit', ['input' => 'Cadastrar'])
{!! Form::close() !!}

@include('group/list', ['group_list' => $groups])

@endsection