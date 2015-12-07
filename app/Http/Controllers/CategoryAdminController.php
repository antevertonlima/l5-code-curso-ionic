<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\CategoryRepository;
use Illuminate\Http\Request;

use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Controllers\Controller;

class CategoryAdminController extends Controller
{
    protected $catRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->catRepository = $categoryRepository;
    }

    public function index()
    {
        $category = $this->catRepository->paginate(10);
        return view('admin.category.index', compact('category'));
    }

    public function create()
    {
        return view('admin.category.store', compact('category'));
    }

    public function store(Request $request)
    {
        $inputs = $request->all();
        $this->catRepository->create($inputs);
        return redirect()->route('adminCategory');
    }

    public function edit($category_id)
    {
        $category = $this->catRepository->find($category_id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $category_id)
    {
        $inputs = $request->all();
        $this->catRepository->update($inputs, $category_id);
        return redirect()->route('adminCategory');
    }

    public function destroy($category_id)
    {
        $category = $this->catRepository->find($category_id);
        $category->delete();
        return redirect()->route('adminCategory');
    }
}
