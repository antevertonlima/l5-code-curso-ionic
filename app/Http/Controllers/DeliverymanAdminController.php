<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\ClientRepository;
use CodeDelivery\Services\ClientService;
use Illuminate\Http\Request;

use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Requests\AdminClientRequest;
use CodeDelivery\Http\Controllers\Controller;

class DeliverymanAdminController extends Controller
{
    protected $repository;
    /**
     * @var ClientService
     */
    private $clientService;

    public function __construct(ClientRepository $repository, ClientService $clientService)
    {
        $this->repository = $repository;
        $this->clientService = $clientService;
    }

    public function index()
    {
        $deliveryman = $this->repository->paginate(10);
        return view('admin.deliveryman.index', compact('deliveryman'));
    }

    public function create()
    {
        return view('admin.deliveryman.store');
    }

    public function store(AdminClientRequest $request)
    {
        $inputs = $request->all();
        $inputs['user']['role'] = 'deliveryman'; //user[role]
        $this->clientService->create($inputs);
        return redirect()->route('admin.deliveryman.index');
    }

    public function edit($deliveryman_id)
    {
        $deliveryman = $this->repository->with('user')->find($deliveryman_id);
        return view('admin.deliveryman.edit', compact('deliveryman'));
    }

    public function update(AdminClientRequest $request, $deliveryman_id)
    {
        $inputs = $request->all();
        $this->clientService->update($inputs, $deliveryman_id);
        return redirect()->route('admin.deliveryman.index');
    }

    public function destroy($deliveryman_id)
    {
        $deliveryman = $this->repository->find($deliveryman_id);
        $deliveryman->delete();
        return redirect()->route('admin.deliveryman.index');
    }
}
