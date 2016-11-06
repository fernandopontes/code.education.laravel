@extends('store.store')

@section('categories')
    @include('store.partial.categories')
@endsection

@section('content')

    <div class="container">

        @if($cart != "empty")
            <h3>Pedido realizado com sucesso!</h3>

            <p>O pedido #{{ $orderDB->id }}, foi realizado com sucesso!</p>
        @else
            <h3>Carrinho de compras vazio!</h3>
        @endif
    </div>
@endsection