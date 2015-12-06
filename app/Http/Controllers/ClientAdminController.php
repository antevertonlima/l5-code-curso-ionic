<?php

namespace CodeDelivery\Http\Controllers;


use CodeDelivery\Repositories\ClientRepository;
use CodeDelivery\Repositories\UserRepository;
use Illuminate\Http\Request;

use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Controllers\Controller;

class ClientAdminController extends Controller
{
    protected $users, $client;

    public function __construct(ClientRepository $client, UserRepository $users)
    {
        $this->client = $client;
        $this->users = $users;
    }

    public function index()
    {
        $clients = $this->users->paginate(10);
       
        return view('admin.client.index', compact('clients'));
    }

    public function edit($user_id)
    {
        null;
    }

    public function destroy($client_id, $user_id)
    {
        $client = $this->client->find($client_id);
        $user = $this->users->find($user_id);
        $client->delete();
        $user->delete();

        return redirect()->route('adminClient');
    }
}
