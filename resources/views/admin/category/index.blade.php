@extends('admin')

@section('titleLeft')
	Gerenciamento de Categorias
@endsection

@section('titlePainel')
	Listagem de Categorias
@endsection

@section('optionsPainel')
    <li>
        <a href="{{ route('adminCreateCategory') }}" data-toggle="tooltip"
           data-placement="right" title=""
           data-original-title="Adicionar Nova Categoria">
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
        			<th>Nome</th>
        			<th>Ações</th>
        		</tr>
        	</thead>
        	<tbody>
        		@foreach($category as $categorias)
	    			<tr>
	        			<td>{{ $categorias->id }}</td>
						<td>{{ $categorias->name }}</td>
	        			<td>
                            <a href="{{ route('adminCategoryEdit',
                            				 ['category_id' => $categorias->id ]) }}"
							   class="btn btn-info btn-xs"
                            	data-toggle="tooltip" 
                            	data-placement="top" title="" 
                            	data-original-title="Editar Categorias">
                            	<i class="fa fa-pencil"></i>  
                            </a>
                            <a href="{{ route('adminCategoryDestroy',
                            				 [ 'category_id' => $categorias->id ]) }}"
							   class="btn btn-danger btn-xs"
                            	data-toggle="tooltip" 
                            	data-placement="top" title="" 
                            	data-original-title="Excluir Categorias">
                            	<i class="fa fa-trash-o"></i>  
                            </a>
                        </td>
	        		</tr>
        		@endforeach
        	</tbody>
        </table>

		{!! $category->render() !!}
    </div>

@endsection