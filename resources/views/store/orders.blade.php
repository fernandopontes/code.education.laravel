@extends('store.store')

@section('categories')
    @include('store.partial.categories')
@endsection

@section('content')
    <div class="col-sm-9">
    <div>

        <h3>Meus pedidos</h3>

        <table class="table" width="100%">
            <tbody>
            <tr>
                <th>ID</th>
                <th>Itens</th>
                <th>Valor</th>
                <th>Status</th>
            </tr>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>
                    <ul>
                    @foreach($order->items as $item)
                        <li>{{ $item->product->name }}</li>
                    @endforeach
                    </ul>
                </td>
                <td>{{ $order->total }}</td>
                <td>{{ $order->status }}</td>
            </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    </div>
@endsection