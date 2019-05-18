<table class="default-table">
<thead>
<tr>
<td>#</td>
<td>Nome do grupo </td>
<td>Instituição</td>
<td>Nome do responsável</td>
<td>Total</td>
<td>Opções</td>
</tr>
</thead>

<tbody>
@foreach($group_list as $group)
<tr>
<td>{{ $group->id }} </td>
<td>{{ $group->name }} </td>

<td> {{$group->institution->name }} </td>
    <td> {{ $group->user->name }} </td>
    <td> R$ {{ number_format($group->total_value, 2, ',', '.') }} </td>


<td>{!! Form::open(['route' => ['group.destroy', $group->id], 'method' => 'delete']) !!}
{!! Form::submit("Remover") !!}
{!! Form::close() !!}
<a href="{{ route('group.show', $group->id) }}">Detalhes</a> |
<a href="{{ route('group.edit', $group->id) }}">Editar</a>
</td>
</tr>
@endforeach
</tbody>
</table>