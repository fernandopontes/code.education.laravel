<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Product;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;

class AdminProductsController extends Controller
{
    private $products;

    /**
     * AdminProductsController constructor.
     */
    public function __construct(Product $product)
    {
        $this->products = $product;
    }

    public function index($pagination = NULL)
    {
        $products = $this->products->all();

        return view('products', compact('products'));
    }

    public function cadastrar()
    {

    }

    public function editar($id)
    {

    }

    public function buscar($search)
    {

    }
}
