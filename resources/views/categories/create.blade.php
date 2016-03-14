@extends('app')

@section('conteudo')
    <div class="container">
        <h1>Create category</h1>


        @if (count($errors) > 0)
            <ul class="alert alert-warning">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif


    {!! Form::open(['route' => 'categories.store']) !!}

        <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
        {!! Form::label('description', 'Description:') !!}
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Add Category', ['class' => 'btn btn-primary form-control']) !!}
        </div>

    {!! Form::close() !!}
</div>
@endsection
