<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\OrderRepository;
use Illuminate\Http\Request;

use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Controllers\Controller;

class OrdersController extends Controller
{
    /**
     * @var OrderRepository
     */
    private $repository;

    public function __construct(OrderRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $orders = $this->repository->paginate();
        return view('admin.orders.index', compact('orders'));
    }

    public function edit($order_id)
    {
        $list_status = [
            0 => 'Pendente',
            1 => 'A Caminho',
            2 => 'Entregue',
            3 => 'Cancelado'
        ];
        $orders = $this->repository->find($order_id);
        return view('admin.orders.edit', compact('orders','list_status'));
    }
}
