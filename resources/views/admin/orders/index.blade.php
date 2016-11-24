@extends('admin')

@section('titleLeft')
	Gerenciar Pedidos
@endsection

@section('titlePainel')
	Listagem de Pedidos
@endsection

@section('optionsPainel')
    <li>

    </li>
@endsection

@section('content')

    <div class="content">
        <table class="table table-striped projects">
        	<thead>
        		<tr>
                    <th>Id</th>
                    <th>Total</th>
                    <th>Data</th>
                    <th>Itens</th>
					<th>Entregador</th>
                    <th>Status</th>
        			<th>Ações</th>
        		</tr>
        	</thead>
        	<tbody>
        		@foreach($orders as $order)
	    			<tr>
	        			<td>{{ $order->id }}</td>
                        <td>{{ $order->total }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td>
                            <ul>
                                @foreach($order->items as $item)
                                    <li>{{ $item->product->name }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            @if($order->deliveryman)
                                {{ $order->deliveryman->name }}
                            @else
                                --
                            @endif
                        </td>
                        <td>
                            @if ($order->status == 0)
                                Pendente
                            @elseif ($order->status == 1)
                                A Caminho
                            @elseif ($order->status == 2)
                                Entregue
                            @else
                                Cancelado
                            @endif
                        </td>
	        			<td>
                            <a href="{{ route('admin.orders.edit',
                            				 ['order_id' => $order->id ]) }}"
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