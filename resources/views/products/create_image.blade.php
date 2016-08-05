@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Upload Image</h1>


        @if (count($errors) > 0)
            <ul class="alert alert-warning">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif


    {!! Form::open(['route' => ['products.image.store', $product->id], 'files' => true]) !!}

        <div class="form-group">
            {!! Form::label('image', 'Image:') !!}
            {!! Form::file('image', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Add Image', ['class' => 'btn btn-primary form-control']) !!}
        </div>

    {!! Form::close() !!}

        <a href="{{ route('products.images', $product->id) }}" class="btn btn-default">Voltar</a>
</div>
@endsection
