@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editing product: {{ $product->name }}</h1>

        @if (count($errors) > 0)
            <ul class="alert alert-warning">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

    {!! Form::open(['route' => ['products.update', $product->id], 'method' => 'put']) !!}

        <div class="form-group">
            {!! Form::label('categories', 'Categories:') !!}
            {!! Form::select('category_id', $categories, $product->category_id, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', $product->name, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
        {!! Form::label('description', 'Description:') !!}
        {!! Form::textarea('description', $product->description, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('price', 'Price:') !!}
            {!! Form::text('price', $product->price, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('featured', 'Featured:') !!}
            {!! Form::select('featured', ['1' => 'Sim', '0' => 'Não'], $product->featured, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('recommend', 'Recommend:') !!}
            {!! Form::select('recommend', ['1' => 'Sim', '0' => 'Não'], $product->recommend, ['class' => 'form-control']) !!}
        </div>

        <?php
            $tagsDb = array();

            foreach($tags as $tag)
            {
                $tagsDb[] = $tag->name;
            }
        ?>
        <div class="form-group">
            {!! Form::label('tags', 'Tags: (separe as tags com vírgula)') !!}
            {!! Form::textarea('tags', implode(', ', $tagsDb), ['class' => 'form-control', 'rows' => '5']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Edit Product', ['class' => 'btn btn-primary form-control']) !!}
        </div>

    {!! Form::close() !!}
</div>
@endsection
