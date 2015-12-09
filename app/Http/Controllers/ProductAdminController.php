<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\ProductRepository;
use Illuminate\Http\Request;

use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Requests\AdminProductRequest;
use CodeDelivery\Http\Controllers\Controller;

class ProductAdminController extends Controller
{
    protected $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $product = $this->repository->paginate(10);
        return view('admin.product.index', compact('product'));
    }

    public function create()
    {
        return view('admin.product.store', compact('product'));
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
        return view('admin.product.edit', compact('product'));
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
