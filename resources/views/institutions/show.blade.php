@extends('templates.master')

@section('conteudo-view')
<h1>Grupos da {{ $institution->name }}</h1>
@include('group/list', ['group_list' => $institution->groups])
@endsection