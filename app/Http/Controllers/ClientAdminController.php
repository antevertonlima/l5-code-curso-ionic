<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\ClientRepository;
use Illuminate\Http\Request;

use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Requests\AdminClientRequest;
use CodeDelivery\Http\Controllers\Controller;

class ClientAdminController extends Controller
{
    protected $repository;

    public function __construct(ClientRepository $repository)
    {
        $this->repository = $repository;
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
        $this->repository->create($inputs);
        return redirect()->route('adminClient');
    }

    public function edit($client_id)
    {
        $client = $this->repository->find($client_id);
        return view('admin.client.edit', compact('client'));
    }

    public function update(AdminClientRequest $request, $client_id)
    {
        $inputs = $request->all();
        $this->repository->update($inputs, $client_id);
        return redirect()->route('adminClient');
    }

    public function destroy($client_id)
    {
        $client = $this->repository->find($client_id);
        $client->delete();
        return redirect()->route('adminClient');
    }
}
