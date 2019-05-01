@extends ('templates.master')

@section('conteudo-view')
{!! Form::model($group, ['route' => ['group.update', $group->id], 'method' => 'put', 'class' => 'form-padrao']) !!}
@include ('templates.formularios.input', ['label' => 'Nome do grupo', 'input' => 'name', 'attributes' => ['placeholder' => 'Nome do grupo']])
@include ('templates.formularios.select', ['label' => 'User', 'select' => 'user_id', 'data' => $user_list, 'attributes' => ['placeholder' => 'User']])
@include ('templates.formularios.select', ['label' => 'Instituição', 'select' => 'institution_id', 'data' => $institution_list, 'attributes' => ['placeholder' => 'Instituição']])
@include ('templates.formularios.submit', ['input' => 'Atualizar'])
{!! Form::close() !!}
@endsection
