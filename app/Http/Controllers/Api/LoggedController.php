<?php

namespace CodeDelivery\Http\Controllers\Api;

use CodeDelivery\Http\Controllers\Controller;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;
use CodeDelivery\Repositories\UserRepository;
use Illuminate\Http\Request;

class LoggedController extends Controller
{
    
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $id = Authorizer::getResourceOwnerId();
        $logged = $this->userRepository->skipPresenter(false)->find($id);
        return $logged;
    }

    public function updateDeviceToken(Request $request)
    {
        $id = Authorizer::getResourceOwnerId();
        $deviceToken = $request->get('device_token');
        return $this->userRepository->updateDeviceToken($id,$deviceToken);
    }

}
