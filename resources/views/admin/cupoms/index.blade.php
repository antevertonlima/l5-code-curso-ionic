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
                <th>QrCode</th>
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
                    {!! QrCode::format('png')->size(100)->generate($cupom->code, 'assets/qr-code/thumbs/'.$cupom->code.'.png'); !!}
                    <a href="#" data-toggle="modal" data-target="#modal_qrcode_{{ $cupom->id }}">
                        <img src="../assets/qr-code/thumbs/{{$cupom->code}}.png" alt="">
                    </a>
                </td>
                <td>
                    <a href="{{ route('admin.cupoms.edit', ['id' => $cupom->id ]) }}"
                       class="btn btn-info btn-xs" data-toggle="tooltip"
                       data-placement="top" title="" data-original-title="Editar Cupom">
                        <i class="fa fa-pencil"></i>
                    </a>
                    <a href="{{ route('admin.cupoms.destroy', [ 'id' => $cupom->id ]) }}"
                       class="btn btn-danger btn-xs" data-toggle="tooltip"
                       data-placement="top" title="" data-original-title="Excluir Cupom">
                        <i class="fa fa-trash-o"></i>
                    </a>
                </td>
            </tr>

            <!-- Modal -->
            <div class="modal fade" id="modal_qrcode_{{ $cupom->id }}" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Cupom "{{ $cupom->code }}"</h4>
                        </div>
                        <div class="modal-body">
                            {!! QrCode::format('png')->size(400)->generate($cupom->code, 'assets/qr-code/normals/'.$cupom->code.'.png'); !!}
                            <img src="../assets/qr-code/normals/{{$cupom->code}}.png" alt="">
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
        {!! $cupoms->render() !!}
    </div>
@stop