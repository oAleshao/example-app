@extends('templates.main')

@section('content')
    <h1>Books</h1>

    <a href="{{ route('books.create') }}" class="btn btn-primary">Create book</a>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
                <th>Genre</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <img src="{{asset($book->image) }}" alt="{{ $book->name }}" style="width: 100px">
                    </td>
                    <td>{{ $book->name }}</td>
                    <td>{{ $book->short_description }}</td>
                    <td>{{ $book->genre->name }}</td>
                    <td>
                        <a href="{{ route('books.edit', ['book' => $book->id]) }}" class="btn btn-warning">Edit</a>

                        {!! Form::open(['route' => ['books.destroy', $book->id], 'method' => 'delete']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{$books->links()}}
@endsection