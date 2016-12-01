<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pedido realizado com sucesso</title>

    <style type="text/css">

    </style>
</head>
<body>
    <p class="text-cab">Olá {{ $user->name }} </p>
    <p>O seu pedido foi realizado com sucesso :)</p>

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
                    {{ $order->product->name }}
                </td>
                <td>{{ $order->price }}</td>
                <td>{{ $order->qtd }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>