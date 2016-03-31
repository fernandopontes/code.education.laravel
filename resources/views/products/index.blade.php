@extends('app')

@section('conteudo')
    <div class="container">
        <h1>Products</h1>

        <p><a href="{{ route('products.create') }}" class="btn btn-primary">Create product</a></p>

        <table class="table">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->name }}</td>
                <td>{{ $product->description }}</td>
                <td>
                    <a href="{{ route('products.edit', ['id' => $product->id]) }}">Edit</a> |
                    <a href="{{ route('products.destroy', ['id' => $product->id]) }}">Delete |</a>
                    <a href="{{ route('products.images', ['id' => $product->id]) }}">Images</a>
                </td>
            </tr>
            @endforeach
        </table>

        {!! $products->render() !!}
    </div>
@endsection
