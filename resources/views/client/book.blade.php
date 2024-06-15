@extends('templates.main')

@section('content')
    
<h1>{{$book->name}}</h1>

<img src="{{asset($book->image)}}" alt="{{$book->name}}" class="img-fluid">
<p>
    {{$book->description}}
</p>

<h2 class="mt-5">Recommended</h2>
<div class='row'>
    @foreach ($book->books as $rec_book)
        <img src="{{asset($rec_book->image)}}" alt="{{$rec_book->name}}" class="img-fluid">
<div class="h3">{{$rec_book->name}}</div>
    @endforeach
</div>

@endsection

@section("title", $title)