<?php

namespace CodeDelivery\Http\Middleware;

use Closure;
use CodeDelivery\Repositories\UserRepository;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class OAuthCheckRole
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {

        $this->userRepository = $userRepository;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role) //aqui adicionamos um parametro para o middleware
    {
        $id = Authorizer::getResourceOwnerId();
        $user = $this->userRepository->find($id);

        if($user->role != $role) { //se a role do usuário autenticado bate com a $role que passamos
            abort(403, 'Acesso Negado!');
        }

        return $next($request);
    }
}
