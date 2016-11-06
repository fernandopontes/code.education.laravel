<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Category;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index()
    {

    }

    public function orders()
    {
        $categories = Category::all();

        $orders = Auth::user()->orders;

        return view('store.orders', compact('categories', 'orders'));
    }
}
