<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;

class AdminCategoriesController extends Controller
{

    private $categories;

    /**
     * AdminCategoriesController constructor.
     */
    public function __construct(Category $category)
    {
        $this->categories = $category;
    }

    public function index()
    {
        $categories = $this->categories->all();

        return view('categories', compact('categories'));
    }
}
