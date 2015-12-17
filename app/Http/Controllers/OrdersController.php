<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\UserRepository;
use Illuminate\Http\Request;

use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Controllers\Controller;

class OrdersController extends Controller
{
    /**
     * @var OrderRepository
     */
    private $repository;
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(OrderRepository $repository, UserRepository $userRepository)
    {
        $this->repository = $repository;
        $this->userRepository = $userRepository;
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
        $deliveryman = $this->userRepository->getDeliverymen();
        return view('admin.orders.edit', compact('orders','list_status','deliveryman'));
    }

    public function update(Request $request, $id)
    {
        $all = $request->all();
        $orders = $this->repository->update($all, $id);
        return redirect()->route('admin.orders.index');
    }
}
