@extends('admin')

@section('titleLeft')
	Gerenciamento de Clientes
@endsection

@section('titlePainel')
	Listagem de Administradores
@endsection

@section('optionsPainel')
    <li>
        <a href="{{ route('admin.manager.create') }}" data-toggle="tooltip"
           data-placement="right" title=""
           data-original-title="Adicionar Novo Administrador">
            <i class="fa fa-plus-circle fa-2x"></i>
        </a>
    </li>
@endsection

@section('content')

    <div class="content">
        <table class="table table-striped projects">
        	<thead>
        		<tr>
					<th>Foto</th>
        			<th>Nome</th>
        			<th>E-mail</th>
        			<th>Tipo</th>
        			<th>Dt Criação</th>
        			<th>Dt Atualização</th>
        			<th>Ações</th>
        		</tr>
        	</thead>
        	<tbody>
        		@foreach($manager as $managers)
	    			@if($managers->role == 'admin')
						<tr>
							<td><img class="img-circle profile_img" src="{{ $managers->gravatar }}" alt="{{ $managers->name }}"></td>
							<td>{{ $managers->name }}</td>
							<td>{{ $managers->email }}</td>
							<td>{{ $managers->role }}</td>
							<td>{{ $managers->created_at }}</td>
							<td>{{ $managers->updated_at }}</td>
							<td>
								<a href="{{ route('admin.manager.edit', ['user_id' => $managers->id]) }}"
								   class="btn btn-info btn-xs" data-toggle="tooltip"
								   data-placement="top" title="" data-original-title="Editar ADM">
									<i class="fa fa-pencil"></i>
								</a>
								<a href="{{ route('admin.manager.destroy', ['user_id' => $managers->id]) }}"
								   class="btn btn-danger btn-xs" data-toggle="tooltip"
								   data-placement="top" title="" data-original-title="Excluir ADM">
									<i class="fa fa-trash-o"></i>
								</a>
							</td>
						</tr>
					@endif
        		@endforeach
        	</tbody>
        </table>
		{!! $manager->render() !!}
    </div>

@endsection