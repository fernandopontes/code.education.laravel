<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    private $categoryModel;

    public function __construct(Category $categoryModel)
    {
        $this->categoryModel = $categoryModel;
    }

    public function index()
    {
        $categories = $this->categoryModel->paginate(10);

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Requests\CategoryRequest $request)
    {
        $input = $request->all();

        $category = $this->categoryModel->fill($input);

        $category->save();

        return redirect('admin/categories');
    }

    public function edit($id)
    {
        $category = $this->categoryModel->find($id);

        return view('categories.edit', compact('category'));
    }

    public function update(Requests\CategoryRequest $request, $id)
    {
        $this->categoryModel->find($id)->update($request->all());

        return redirect('admin/categories');
    }

    public function destroy($id)
    {
        $this->categoryModel->find($id)->delete();

        return redirect('admin/categories');
    }
}
