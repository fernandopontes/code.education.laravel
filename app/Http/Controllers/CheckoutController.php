<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Events\CheckoutEvent;
use CodeCommerce\Order;
use CodeCommerce\OrderItem;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function __construct()
    {

    }

    public function place(Order $order, OrderItem $orderItem)
    {
        /*if(Session::has('cart'))
        {
            return false;
        }*/

        $categories = Category::all();

        $cart = Session::get('cart');

        if($cart->getTotal() > 0)
        {
            $orderDB = $order->create([
                'user_id' => Auth::user()->id,
                'total' => $cart->getTotal()
            ]);

            foreach($cart->all() as $k => $item)
            {
                $orderItem->create([
                    'product_id' => $k,
                    'order_id' => $orderDB->id,
                    'price' => $item['price'],
                    'qtd' => $item['qtd']
                ]);
            }

            $cart->clear();

            event(new CheckoutEvent(Auth::user(), $orderDB->items));

            return view('store.checkout', compact('orderDB', 'cart', 'categories'));
        }

        return view('store.checkout', ['cart' => 'empty', 'categories' => $categories]);
    }
}
