@extends('admin')

@section('titleLeft')
	Gerenciamento de Entregadores
@endsection

@section('titlePainel')
	Listagem de Entregadores
@endsection

@section('optionsPainel')
    <li>
        <a href="{{ route('admin.deliveryman.create') }}" data-toggle="tooltip"
           data-placement="right" title=""
           data-original-title="Adicionar Novo Entregador">
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
        		@foreach($deliveryman as $entregador)
	    			@if($entregador->user->role == 'deliveryman')
						<tr>
							<td><img class="img-circle profile_img" src="{{ $entregador->user->gravatar }}" alt="{{ $entregador->user->name }}"></td>
							<td>{{ $entregador->user->name }}</td>
							<td>{{ $entregador->user->email }}</td>
							<td>{{ $entregador->user->role }}</td>
							<td>{{ $entregador->created_at }}</td>
							<td>{{ $entregador->updated_at }}</td>
							<td>
								<a href="{{ route('admin.deliveryman.edit',
                            				 ['deliveryman_id' => $entregador->id]) }}"
								   class="btn btn-info btn-xs"
								   data-toggle="tooltip"
								   data-placement="top" title=""
								   data-original-title="Editar Entregador">
									<i class="fa fa-pencil"></i>
								</a>
								<a href="{{ route('admin.deliveryman.destroy',
                            				 ['deliveryman_id' => $entregador->id]) }}"
								   class="btn btn-danger btn-xs"
								   data-toggle="tooltip"
								   data-placement="top" title=""
								   data-original-title="Excluir Entregador">
									<i class="fa fa-trash-o"></i>
								</a>
							</td>
						</tr>
						<tr>
							<td colspan="6">
								<strong>Address:</strong> {{ $entregador->address }}<br>
								<strong>Phone:</strong> {{ $entregador->phone }}<br>
								<strong>City:</strong> {{ $entregador->city }}<br>
								<strong>State:</strong> {{ $entregador->state }}<br>
								<strong>Zipcode:</strong> {{ $entregador->zipcode }}
							</td>
						</tr>
					@endif
        		@endforeach
        	</tbody>
        </table>

		{!! $deliveryman->render() !!}
    </div>

@endsection