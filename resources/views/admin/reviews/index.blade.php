@extends('templates.main')

@section('content')
    <h1>Reviews</h1>
    <a href="{{route("reviews.create")}}" class="btn btn-primary">Create review</a>
   

   @foreach ($reviews as $review)
        <div class="mt-3 border" style="padding: 10px">
            <div class="mt-1 h5">Book: "{{$review->book->name}}"</div>
            {{ $review->data }}
            <div style="text-align: right">{{ $review->created_at }}</div>
        </div> 
        @endforeach 
    
@endsection