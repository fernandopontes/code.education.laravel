<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests\OrderRequest;
use CodeCommerce\Order;
use CodeCommerce\OrderItem;

use Illuminate\Http\Request;


class OrdersController extends Controller
{
    private $orderModel;
    private $orderItemModel;

    public function __construct(Order $orderModel, OrderItem $orderItemModel)
    {
        $this->orderModel = $orderModel;
        $this->orderItemModel = $orderItemModel;
    }

    public function index()
    {
        $orders = $this->orderModel->paginate(10);

        return view('orders.index', compact('orders'));
    }

    public function edit($id)
    {
        $order = $this->orderModel->find($id);

        return view('orders.edit', compact('order'));
    }

    public function update(OrderRequest $request, $id)
    {
        $input = $request->all();

        $this->orderModel->find($id)->update($input);

        return redirect('admin/orders');
    }

    public function destroy($id)
    {
        $this->orderModel->find($id)->delete();

        return redirect('admin/orders');
    }
}
