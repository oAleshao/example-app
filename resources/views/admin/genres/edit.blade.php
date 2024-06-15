@extends('templates.main')

@section('content')
    <h1>Edit Genre</h1>

    {!! Form::model($genre, ['route' => ['genres.update', $genre->id], 'method' => 'put']) !!}

    @include('admin.genres._form')

    {!! Form::close() !!}
@endsection