@extends('admin')

@section('titleLeft')
	Gerenciamento de Produtos
@endsection

@section('titlePainel')
	Listagem de Produtos
@endsection

@section('optionsPainel')
    <li>
        <a href="{{ route('admin.product.create') }}" data-toggle="tooltip"
           data-placement="right" title=""
           data-original-title="Adicionar Novo Produto">
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
        			<th>Produto</th>
                    <th>Categoria</th>
                    <th>Preço</th>
        			<th>Ações</th>
        		</tr>
        	</thead>
        	<tbody>
        		@foreach($product as $products)
	    			<tr>
	        			<td>{{ $products->id }}</td>
						<td>{{ $products->name }}</td>
                        <td>{{ $products->category->name }}</td>
                        <td>{{ $products->price }}</td>
	        			<td>
                            <a href="{{ route('admin.product.edit',
                            				 ['product_id' => $products->id ]) }}"
							   class="btn btn-info btn-xs"
                            	data-toggle="tooltip" 
                            	data-placement="top" title="" 
                            	data-original-title="Editar Produtos">
                            	<i class="fa fa-pencil"></i>  
                            </a>
                            <a href="{{ route('admin.product.destroy',
                            				 [ 'product_id' => $products->id ]) }}"
							   class="btn btn-danger btn-xs"
                            	data-toggle="tooltip" 
                            	data-placement="top" title="" 
                            	data-original-title="Excluir Produtos">
                            	<i class="fa fa-trash-o"></i>  
                            </a>
                        </td>
	        		</tr>
        		@endforeach
        	</tbody>
        </table>

		{!! $product->render() !!}
    </div>

@endsection