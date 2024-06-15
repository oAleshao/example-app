@extends('templates.main')

@section('content')
    <h1>Create Genre</h1>

    {!! Form::open(['route' => 'genres.store']) !!}

    @include('admin.genres._form')
    
    {!! Form::close() !!}
@endsection