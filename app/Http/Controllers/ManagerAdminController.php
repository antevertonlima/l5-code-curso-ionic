<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\UserRepository;
use Illuminate\Http\Request;
use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Controllers\Controller;

class ManagerAdminController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $manager = $this->userRepository->paginate(15);
        return view('admin.manager.index', compact('manager'));
    }

    public function create()
    {
        return view('admin.manager.store');
    }

    public function store(Request $request)
    {
        $inputs = $request->all();
        $inputs['role'] = 'admin';
        $inputs['password'] = bcrypt($request->get('email'));
        $inputs['gravatar'] = "https://www.gravatar.com/avatar/".md5($request->get('email'));
        $this->userRepository->create($inputs);
        return redirect()->route('admin.manager.index');
    }

    public function edit($user_id)
    {
        $manager = $this->userRepository->find($user_id);
        return view('admin.manager.edit', compact('manager'));
    }

    public function update(Request $request, $user_id)
    {
        $inputs = $request->all();
        $this->userRepository->update($inputs, $user_id);
        return redirect()->route('admin.manager.index');
    }

    public function destroy($user_id)
    {
        $manager = $this->userRepository->find($user_id);
        $manager->delete();
        return redirect()->route('admin.manager.index');
    }
}
