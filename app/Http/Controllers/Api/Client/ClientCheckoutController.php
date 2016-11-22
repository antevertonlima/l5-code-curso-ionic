<?php

namespace CodeDelivery\Http\Controllers\Api\Client;

use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Http\Requests\CheckoutRequest;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Services\OrderService;
use Illuminate\Support\Facades\Auth;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class ClientCheckoutController extends Controller
{
    /**
     * @var OrderRepository
     */
    private $orderRepository;
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var ProductRepository
     */
    private $productRepository;
    /**
     * @var OrderService
     */
    private $service;

    public function __construct(OrderRepository $orderRepository, UserRepository $userRepository,
        ProductRepository $productRepository, OrderService $service
    )
    {
        $this->orderRepository = $orderRepository;
        $this->userRepository = $userRepository;
        $this->productRepository = $productRepository;
        $this->service = $service;
    }

    public function index()
    {
        $id = Authorizer::getResourceOwnerId();
        $clientId = $this->userRepository->find($id)->client->id;
        $orders = $this->orderRepository
                  ->skipPresenter(false)
                  ->scopeQuery(function($query) use($clientId) {
           return $query->where('client_id','=',$clientId);
        })->paginate();
        return $orders;
    }


    public function show($id)
    {
        $idUser = Authorizer::getResourceOwnerId();
        $idClient = $this->userRepository->find($idUser)->client->id;
        $o = $this->orderRepository
            ->skipPresenter(false)
            ->getByIdAndClient($id, $idClient);
        return $o;
    }

    public function store(CheckoutRequest $request)
    {
        $data = $request->all();
        $id = Authorizer::getResourceOwnerId();
        $clientId = $this->userRepository->find($id)->client->id;
        $data['client_id'] = $clientId;
        $o = $this->service->create($data);

        return $this->orderRepository->skipPresenter(false)->find($o->id);
    }

}
