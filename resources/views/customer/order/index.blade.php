@extends('front')

@section('content')
    <!-- /#content -->
    <div id="content">
        <div class="container">
            <div class="row">
                <!-- *** LEFT COLUMN *** -->
                <div class="col-md-9" id="customer-orders">
                    <p class="text-muted lead">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p>
                    <div class="box">
                        <a href="{{ route('customer.order.create') }}" class="btn btn-template-main btn-sm">
                            Novo Pedido
                        </a>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <th># {{ $order->id }}</th>
                                        <td>R$ {{ $order->total }}</td>
                                        <td>
                                            <span class="label label-info">
                                                @if ($order->status == 0)
                                                    Pendente
                                                @elseif ($order->status == 1)
                                                    A Caminho
                                                @elseif ($order->status == 2)
                                                    Entregue
                                                @else
                                                    Cancelado
                                                @endif
                                            </span>
                                        </td>
                                        <td>
                                            <a href="customer-order.html" class="btn btn-template-main btn-sm">Ver Detalhes</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {!! $orders->render() !!}
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col-md-9 -->
                <!-- *** LEFT COLUMN END *** -->

                <!-- *** RIGHT COLUMN *** -->
                <div class="col-md-3">
                    <!-- *** CUSTOMER MENU *** -->
                    <div class="panel panel-default sidebar-menu">
                        <div class="panel-heading">
                            <h3 class="panel-title">Seção do Cliente</h3>
                        </div>
                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked">
                                <li class="active"><a href="customer-orders.html"><i class="fa fa-list"></i> Meus Pedidos</a></li>
                                <li><a href="customer-account.html"><i class="fa fa-user"></i> Minha Conta</a></li>
                                <li><a href="{{ Auth::logout() }}"><i class="fa fa-sign-out"></i> Sair</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.col-md-3 -->
                    <!-- *** CUSTOMER MENU END *** -->
                </div>
                <!-- *** RIGHT COLUMN END *** -->
            </div>
        </div>
        <!-- /.container -->
    </div>
@endsection
