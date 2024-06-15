@extends('templates.main')

@section('content')
    
<h2>Books</h2>
    <div class="row">
        @foreach ($books as $book)
        
        <div class="col-3">
            <a href="{{route('book', $book->id)}}">
                <img src="{{asset($book->image)}}" alt="{{asset($book->name)}}" class="img-fluid">
                <div class="h3">
                    {{$book->name}}
                </div>
            </a>
        </div>
        
        @endforeach
    
    </div>

    <div class="mt-5">
        <h3>Reviews</h3>
    <a href="{{route("reviews.create")}}" class="btn btn-primary">Create review</a>
   

   @foreach ($reviews as $review)
        <div class="mt-3 border" style="padding: 10px">
            <div class="mt-1 h5">Book: "{{$review->book->name}}"</div>
            {{ $review->data }}
            <div style="text-align: right">{{ $review->created_at }}</div>
        </div> 
    @endforeach 
    </div>

@endsection
