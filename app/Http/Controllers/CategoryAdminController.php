<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\CategoryRepository;
use Illuminate\Http\Request;

use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Controllers\Controller;

class CategoryAdminController extends Controller
{
    public function index(CategoryRepository $catRepository)
    {
        $category = $catRepository->paginate(10);
        return view('admin.category.index', compact('category'));
    }

    public function edit($category_id)
    {
        null;
    }

    public function destroy($category_id)
    {
        null;
    }
}
