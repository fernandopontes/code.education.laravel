@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editing order: {{ $order->id }}</h1>

        @if (count($errors) > 0)
            <ul class="alert alert-warning">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

    {!! Form::open(['route' => ['orders.update', $order->id], 'method' => 'put']) !!}

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Qtd</th>
            </tr>
            </thead>
            <tbody>
            @foreach($order->items as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->qtd }}</td>
                </tr>
            @endforeach
            </tbody>
            <tfooter>
                <tr>
                    <td>TOTAL:</td>
                    <td></td>
                    <td>{{ $order->total }}</td>
                </tr>
            </tfooter>
        </table>

        <div class="form-group">
            {!! Form::label('status', 'Status:') !!}
            {!! Form::select('status', ['0' => 'Pedido realizado', '1' => 'Pedido enviado', '2' => 'Pedido entregue'], $order->status, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Edit Order', ['class' => 'btn btn-primary form-control']) !!}
        </div>

    {!! Form::close() !!}
</div>
@endsection
