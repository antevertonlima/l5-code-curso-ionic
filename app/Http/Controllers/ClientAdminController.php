<?php

namespace CodeDelivery\Http\Controllers;


use CodeDelivery\Models\Client;
use CodeDelivery\Models\User;
use Illuminate\Http\Request;

use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Controllers\Controller;

class ClientAdminController extends Controller
{
    protected $users, $client;

    public function __construct(Client $client, User $users)
    {
        $this->client = $client;
        $this->users = $users;
    }

    public function index()
    {
        $clients = $this->users->all();
       
        return view('admin.client', compact('clients'));
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
