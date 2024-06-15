@extends('templates.main')

@section('content')
    <h1>Contact us</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success">{{session('success')}}</div>alert-success
@endif

    <form action="{{route("contacts.send")}}" method="post">
        @csrf
        <div class="mt-3">
            <label for="">Name:</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
@error('name')
<div class="invalid-feedback">{{$message}}</div>
@enderror
        </div>

        <div class="mt-3">
            <label for="">Email:</label>
            <input type="email" name="Email" id="" class="form-control @error('Email') is-invalid @enderror" value="{{old('Email')}}">
        @error('Email')
<div class="invalid-feedback">{{$message}}</div>
@enderror
        </div>

        <div class="mt-3">
            <label for="">Message:</label>
            <input type="text" name="message" class="form-control @error('message') is-invalid @enderror" value="{{old('message')}}">

@error('message')
<div class="invalid-feedback">{{$message}}</div>
@enderror        </div>

        <button class="btn btn-primary">send</button>
    </form>
@endsection