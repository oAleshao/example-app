@extends('templates.main')

@section('content')
<h1>Create review</h1>
@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::open(['route' => 'reviews.store']) !!}

    @include('admin.reviews._form')

    {!! Form::close() !!}


@endsection