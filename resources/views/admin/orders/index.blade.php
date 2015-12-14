@extends('admin')

@section('titleLeft')
	Pedidos
@endsection

@section('titlePainel')
	Listagem de Pedidos
@endsection

@section('optionsPainel')
    <li>
        <a href="{{ route('orders.index') }}" data-toggle="tooltip"
           data-placement="right" title=""
           data-original-title="Novo Pedidos">
            <i class="fa fa-plus-circle fa-2x"></i>
        </a>
    </li>
@endsection

@section('content')

    <div class="content">
        <table class="table table-striped projects">
        	<thead>
        		<tr>
					<th>Id</th>
        			<th>Ações</th>
        		</tr>
        	</thead>
        	<tbody>
        		@foreach($orders as $pedidos)
	    			<tr>
	        			<td>{{ $pedidos->id }}</td>
	        			<td>
                            <a href="{{ route('orders.edit',
                            				 ['order_id' => $pedidos->id ]) }}"
							   class="btn btn-info btn-xs"
                            	data-toggle="tooltip" 
                            	data-placement="top" title="" 
                            	data-original-title="Editar Categorias">
                            	<i class="fa fa-pencil"></i>  
                            </a>

                        </td>
	        		</tr>
        		@endforeach
        	</tbody>
        </table>

		{!! $orders->render() !!}
    </div>

@endsection