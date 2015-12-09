<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\CategoryRepository;
use Illuminate\Http\Request;

use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Requests\AdminCategoryRequest;
use CodeDelivery\Http\Controllers\Controller;

class CategoryAdminController extends Controller
{
    protected $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $category = $this->repository->paginate(10);
        return view('admin.category.index', compact('category'));
    }

    public function create()
    {
        return view('admin.category.store', compact('category'));
    }

    public function store(AdminCategoryRequest $request)
    {
        $inputs = $request->all();
        $this->repository->create($inputs);
        return redirect()->route('adminCategory');
    }

    public function edit($category_id)
    {
        $category = $this->repository->find($category_id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(AdminCategoryRequest $request, $category_id)
    {
        $inputs = $request->all();
        $this->repository->update($inputs, $category_id);
        return redirect()->route('adminCategory');
    }

    public function destroy($category_id)
    {
        $category = $this->repository->find($category_id);
        $category->delete();
        return redirect()->route('adminCategory');
    }
}
