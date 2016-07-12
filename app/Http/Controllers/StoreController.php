<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Product;
use CodeCommerce\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

use CodeCommerce\Http\Requests;

class StoreController extends Controller
{
    private $categoryModel;
    private $appUrlRoot;

    public function __construct(Category $categoryModel)
    {
        $this->categoryModel = $categoryModel;
        $this->appUrlRoot = App::make('url')->to('/');
    }

    public function index()
    {
        $pFeatured = Product::featured()->get();
        $pRecommend = Product::recommend()->get();

        $categories = Category::all();

        $urlRoot = $this->appUrlRoot;

        return view('store.index', compact('urlRoot', 'categories', 'pFeatured', 'pRecommend'));
    }

    public function category($id)
    {
        $categories = Category::all();
        $category = Category::find($id);
        $products = Product::ofCategory($id)->get();

        return view('store.category', compact('categories', 'products', 'category'));
    }

    public function product($id)
    {
        $categories = Category::all();
        $product = Product::find($id);

        return view('store.product', compact('categories', 'product'));
    }

    public function produtosCategoria($categoryId)
    {
        $category = $this->categoryModel->find($categoryId);

        $pCategory = $category->products;

        $categories = Category::all();

        $pagInterna = 'products_category';

        $urlRoot = $this->appUrlRoot;

        return view('store.index', compact('urlRoot', 'categories', 'category', 'pagInterna', 'pCategory'));
    }

    public function tagProduct($id)
    {
        $tag = Tag::find($id);
        $tProducts = $tag->products;
        $categories = Category::all();

        return view('store.products_tag', compact('tag', 'tProducts', 'categories'));
    }
}
