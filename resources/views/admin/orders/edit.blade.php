@extends('admin')

@section('titleLeft')
	Gerenciar Pedidos
@endsection

@section('titlePainel')  
    Por: {{ $orders->client->user->name }}
@endsection

@section('optionsPainel')
    <li>
        
    </li>
@endsection

@section('content')
    @if( $errors->any() )
        <ul class="alert">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <div class="content">
        <h2>Pedido: #{{ $orders->id }} - R$ {{ $orders->total }} - Data: {{ $orders->created_at }}</h2>
        <p>
            <b>Entregar em:</b> 
            {{ $orders->client->address }} - {{ $orders->client->city }} - {{ $orders->client->state }}
        </p>
        
        <div class="ln_solid"></div>

        {!! Form::model($orders,['route' => ['orders.update', $orders->id], 'class' => 'form-horizontal form-label-left']) !!}

        @include('admin.orders._form')

        <div class="ln_solid"></div>
        <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" class="btn btn-success">Atualizar</button>
            </div>
        </div>

        {!! Form::close() !!}

    </div>

@endsection