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
					<th>Foto</th>
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
						<td>
							<img src="{{ $products->photo . rand(1,10) }}" alt="{{ $products->name }}" class="img-thumbnail">
						</td>
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
                            <a href="{{ route('admin.product.destroy', [ 'product_id' => $products->id ]) }}"
							   class="btn btn-danger btn-xs"
                               data-toggle="tooltip"
                               data-placement="top" title=""
                               data-original-title="Excluir Produtos">
                                <i class="fa fa-trash-o"></i>
                            </a>
                            <span href="#" class="btn btn-success btn-xs"
                               data-toggle="tooltip"
                               data-placement="top" title=""
                               data-original-title="Adicionais do Produto">
                                <a href="#" data-toggle="modal" data-target="#modal_options_product_{{ $products->id }}">
                                    <i class="fa fa-filter"></i>
                                </a>
                            </span>
                        </td>
	        		</tr>
                    <!-- Modal -->
                    <div class="modal fade" id="modal_options_product_{{ $products->id }}" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Opções do produto - {{ $products->name }}</h4>
                                </div>
                                <div class="modal-body text-center">
                                    Corpo
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>
        		@endforeach
        	</tbody>
        </table>
		{!! $product->render() !!}
    </div>
@endsection