@extends('admin')

@section('titleLeft')
	Cadastro de Administradores
@endsection

@section('titlePainel')
	Editar {{ $manager->name }}
@endsection

@section('optionsPainel')
    <li>
        
    </li>
@endsection

@section('content')

    <div class="content">
        @if( $errors->any() )
            <ul class="alert">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        
        {!! Form::model($manager,['route' => ['admin.manager.update', $manager->id],
                                 'class' => 'form-horizontal form-label-left']) !!}

        @include('admin.manager._form')

        <div class="ln_solid"></div>
        <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" class="btn btn-success">Atualizar</button>
            </div>
        </div>

        {!! Form::close() !!}

    </div>

@endsection