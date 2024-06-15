@extends('templates.main')

@section('content')
    <h1>Genres</h1>

    <a href="{{ route('genres.create') }}" class="btn btn-primary">Create genre</a>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($genres as $genre)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $genre->name }} {{$genre->books_count}}</td>
                    <td>{{ $genre->description }}
                    </td>
                    <td>
                        <a href="{{ route('genres.edit', ['genre' => $genre->id]) }}" class="btn btn-warning">Edit</a>

                        {!! Form::open(['route' => ['genres.destroy', $genre->id], 'method' => 'delete']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection