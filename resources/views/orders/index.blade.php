@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Orders</h1>

        <table class="table">
            <tr>
                <th>ID</th>
                <th>Customer</th>
                <th>Total</th>
                <th>Status</th>
                <th>Data</th>
                <th>Action</th>
            </tr>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user->name }}</td>
                <td>{{ $order->total }}</td>
                <td>@if($order->status == 0) Pedido realizado @elseif($order->status == 1) Pedido enviado @elseif($order->status == 2) Pedido entregue @endif</td>
                <td>{{ $order->created_at }}</td>
                <td>
                    <a href="{{ route('orders.edit', ['id' => $order->id]) }}">Edit</a> |
                    <a href="{{ route('orders.destroy', ['id' => $order->id]) }}">Delete</a>
                </td>
            </tr>
            @endforeach
        </table>

        {!! $orders->render() !!}
    </div>
@endsection
