@extends('templates.main')

@section('content')
    
<h1>{{$book->name}}</h1>

<img src="{{asset($book->image)}}" alt="{{$book->name}}" class="img-fluid">
<div class="h2  mt-2">Description</div>
<p class="border" style="padding: 15px">
    {{$book->description}}
</p>

@if (count($book->books) !== 0)
<h2 class="mt-5">Recommended</h2>
<div class='row'>
    @foreach ($book->books as $rec_book)
        <div class="col-3">
            <a href="{{route('book', $rec_book->id)}}">
                <img src="{{asset($rec_book->image)}}" alt="{{$rec_book->name}}" class="img-fluid">
                <div class="h3">{{$rec_book->name}}</div>
            </a>
        </div>
    @endforeach
</div>
@endif()

@if (count($book->reviews ) !== 0)
    <div class="mt-5">
        
    <h3>Reviews</h3>

   @foreach ($book->reviews as $review)
        <div class="mt-3 border" style="padding: 10px">
            <div class="mt-1 h5">Book: "{{$review->book->name}}"</div>
            {{ $review->data }}
            <div style="text-align: right">{{ $review->created_at }}</div>
        </div> 
    @endforeach 
    </div>
@endif
@endsection
