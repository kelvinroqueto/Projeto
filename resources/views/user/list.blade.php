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
@foreach($user_list as $user)
<tr>
<td>{{ $user->id }}</td>
<td>{{ $user->Formattedcpf }}</td>
<td>{{ $user->name }}</td>
<td>{{ $user->Formattedphone }}</td>
<td>{{ $user->Formattedbirth }}</td>
<td>{{ $user->email }}</td>
<td>{{ $user->status }}</td>
<td>{{ $user->permission }}</td>
<td>{!! Form::open(['route' => ['user.destroy', $user->id], 'method' => 'DELETE']) !!} 
{!! Form::submit('Remover') !!}
{!! Form::close() !!} 
<a href="{{route('user.edit', $user->id) }}">Editar</a>
</td>
</tr>
@endforeach
</tbody>



</table>