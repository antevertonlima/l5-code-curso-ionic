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
//        return $this->users->all();
        return $this->client->find(1)->users;
    }
}
