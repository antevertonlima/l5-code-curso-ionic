@extends('admin')

@section('titleLeft')
    Gerenciar Cupoms
@endsection

@section('titlePainel')
    Listagem de Cupoms
@endsection

@section('optionsPainel')
    <li>
        <a href="{{ route('admin.cupoms.create') }}" data-toggle="tooltip"
           data-placement="right" title=""
           data-original-title="Novo Cupom">
            <i class="fa fa-plus-circle fa-2x"></i>
        </a>
    </li>
@endsection

@section('content')

    <div class="container">

        <table class="table table-striped projects">
            <thead>
            <tr>
                <th>ID</th>
                <th>Código</th>
                <th>Valor</th>
                <th>Ação</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cupoms as $cupom)
            <tr>
                <td>{{ $cupom->id }}</td>
                <td>{{ $cupom->code }}</td>
                <td>{{ $cupom->value }}</td>
                <td>
                    <a href="{{ route('admin.cupoms.edit',
                            				 ['id' => $cupom->id ]) }}"
                       class="btn btn-info btn-xs"
                       data-toggle="tooltip"
                       data-placement="top" title=""
                       data-original-title="Editar Cupom">
                        <i class="fa fa-pencil"></i>
                    </a>

                    <a href="{{ route('admin.cupoms.destroy',
                            				 [ 'id' => $cupom->id ]) }}"
                       class="btn btn-danger btn-xs"
                       data-toggle="tooltip"
                       data-placement="top" title=""
                       data-original-title="Excluir Cupom">
                        <i class="fa fa-trash-o"></i>
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>

        {!! $cupoms->render() !!}
    </div>


@stop