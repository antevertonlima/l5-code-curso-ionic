<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Repositories\CategoryRepository;
use Illuminate\Http\Request;

use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Requests\AdminProductRequest;
use CodeDelivery\Http\Controllers\Controller;

class ProductAdminController extends Controller
{
    protected $repository;
    protected $categoryRepository;

    public function __construct(ProductRepository $repository, CategoryRepository $categoryRepository)
    {
        $this->repository = $repository;
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $product = $this->repository->paginate(10);
        return view('admin.product.index', compact('product'));
    }

    public function create()
    {
        $categories = $this->categoryRepository->lists();
        return view('admin.product.store', compact('product','categories'));
    }

    public function store(AdminProductRequest $request)
    {
        $inputs = $request->all();
        $this->repository->create($inputs);
        return redirect()->route('adminProduct');
    }

    public function edit($product_id)
    {
        $product = $this->repository->find($product_id);
        $categories = $this->categoryRepository->lists();
        return view('admin.product.edit', compact('product','categories'));
    }

    public function update(AdminProductRequest $request, $product_id)
    {
        $inputs = $request->all();
        $this->repository->update($inputs, $product_id);
        return redirect()->route('adminProduct');
    }

    public function destroy($product_id)
    {
        $product = $this->repository->find($product_id);
        $product->delete();
        return redirect()->route('adminProduct');
    }
}
