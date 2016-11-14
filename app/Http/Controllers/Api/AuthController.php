<?php

namespace CodeDelivery\Http\Controllers\Api;

use CodeDelivery\Http\Controllers\Controller;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;
use CodeDelivery\Repositories\ClientRepository;
use CodeDelivery\Repositories\UserRepository;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    /**
     * @var ClientRepository
     */
    private $clientRepository;
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(ClientRepository $clientRepository, UserRepository $userRepository)
    {
        $this->clientRepository = $clientRepository;
        $this->userRepository = $userRepository;
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $data['user']['name']     = $input['name'];
        $data['user']['email']    = $input['email'];
        $data['user']['password'] = bcrypt($input['password']);
        $user = $this->userRepository->skipPresenter(false)->create($data['user']);
//        dd($user);
        $data['user_id']          = $user['data']['id'];
        $data['phone']            = '85698569856';
        $data['address']          = 'drtewrtw wertywery wetrywreyt';
        $data['city']             = 'werywerywery';
        $data['state']            = 'ey';
        $data['zipcode']          = '60866320';
        $this->clientRepository->create($data);

        return $data;
    }
}

