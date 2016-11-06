@extends('store.store')

@section('content')

    <section id="cart_items">
        <div class="container">
            <div class="table-responsive cart_info">
                <table class="table table-condensed">

                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description">Descrição</td>
                        <td class="price">Valor</td>
                        <td class="qtd">Qtd</td>
                        <td class="total">Total</td>
                        <td class="total">Ação</td>
                    </tr>
                    </thead>

                    <tbody>
                    @forelse($cart->all() as $k => $item)
                    <tr>
                        <td class="cart_product">
                            <a href="{{ route('store.product', ['id' => $k]) }}"></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="{{ route('store.product', ['id' => $k]) }}">{{ $item['name'] }}</a></h4>
                            <p>Código: {{ $k }}</p>
                        </td>
                        <td class="cart_price">R$ {{ $item['price'] }} <input type="hidden" name="price" value="{{ $item['price'] }}"></td>
                        <td class="cart_quantity"><input type="number" name="qtd" value="{{ $item['qtd'] }}"></td>
                        <td class="cart_total">R$ <span class="cart_total_valor">{{ $item['qtd'] * $item['price'] }}</span></td>
                        <td class="cart_delete">
                            <a href="{{ route('store.cart.destroy', ['id' => $k]) }}" class="cart_quantity_bottom">Delete</a>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td class="" colspan="6">
                                <p class="alert alert-warning">Nenhum item no carrinho</p>
                            </td>
                        </tr>
                    @endforelse
                    <tr class="cart_menu">
                        <td colspan="6">
                            <div class="pull-right">
                                <span>
                                    TOTAL: R$ <span id="cart_total_t">{{ $cart->getTotal() }}</span>
                                </span>

                                <a href="{{ route('checkout.place') }}" class="btn btn-success">Fechar a conta</a>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

@endsection

@section('post-script')
    <script type="text/javascript">
        $("table tr td.cart_quantity input").change(function(){
            var input = this;
            var row = $(input).parent().parent();
            var valor = $(row).find('td.cart_price input').val();
            var qtd = $(row).find('td.cart_quantity input').val();
            $(row).find('td.cart_total span.cart_total_valor').html(valor * qtd);

            var total = 0;

            $('table tr td.cart_quantity input').each(function()
            {
                var row = $(this).parent().parent();
                var valor = $(row).find('td.cart_price input').val();
                var qtd = $(row).find('td.cart_quantity input').val();
                total += valor * qtd;
            });

            $('#cart_total_t').html(total);
        });
    </script>
@endsection