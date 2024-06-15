@extends('templates.main')

@section('content')
    
<h2>Books</h2>
    <div class="row">
        @foreach ($books as $book)
            <div class="col-3">
                <img src="{{asset($book->image)}}" alt="{{asset($book->name)}}" class="img-fluid">
                <div class="h3">
                    {{$book->name}}
                </div>
            </div>
        @endforeach
    </div>

@endsection
