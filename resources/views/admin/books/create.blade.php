@extends('templates.main')

@section('content')
    <h1>Create Book</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {!! Form::open(['route' => 'books.store', 'files' => true]) !!}

    @include('admin.books._form')

    {!! Form::close() !!}
@endsection