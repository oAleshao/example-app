@extends('templates.main')

@section('content')
    <h1>Edit Book</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::model($book, ['route' => ['books.update', $book->id], 'method' => 'put']) !!}

    @include('admin.books._form')

    {!! Form::close() !!}
@endsection