<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\ClientRepository;
use CodeDelivery\Services\ClientService;
use Illuminate\Http\Request;

use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Requests\AdminClientRequest;
use CodeDelivery\Http\Controllers\Controller;

class ClientAdminController extends Controller
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
        $client = $this->repository->paginate(10);
        return view('admin.client.index', compact('client'));
    }

    public function create()
    {
        return view('admin.client.store');
    }

    public function store(AdminClientRequest $request)
    {
        $inputs = $request->all();
        $this->clientService->create($inputs);
        return redirect()->route('admin.client.index');
    }

    public function edit($client_id)
    {
        $client = $this->repository->with('user')->find($client_id);
        return view('admin.client.edit', compact('client'));
    }

    public function update(AdminClientRequest $request, $client_id)
    {
        $inputs = $request->all();
        $this->clientService->update($inputs, $client_id);
        return redirect()->route('admin.client.index');
    }

    public function destroy($client_id)
    {
        $client = $this->repository->find($client_id);
        $client->delete();
        return redirect()->route('admin.client.index');
    }
}
