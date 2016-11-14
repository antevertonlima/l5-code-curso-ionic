<?php

namespace CodeDelivery\Http\Controllers\Auth;

use CodeDelivery\Models\User;
use CodeDelivery\Models\Client;
use Validator;
use Illuminate\Http\Request;
use CodeDelivery\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    protected $redirectPath = '/admin/client';
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function createApi(Request $request)
    {
        $input = $request->all();
        $data['user']['name']               = $input['name'];
        $data['user']['email']              = $input['email'];
        $data['user']['password']           = bcrypt($input['password']);
        $data['user']['remember_token']     = str_random(10);
        return factory(User::class)->create( $data['user'] )->client()->save(factory(Client::class)->make());
    }
}
