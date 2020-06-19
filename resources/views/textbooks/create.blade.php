@extends('layouts.main')

@section('main-content')
    <h1>Add a Text Book</h1>
    
    @if ($errors->any())
    
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    
    @endif

    <form action="{{ route('textbooks.store') }}" method="POST">
        @csrf
        @method('POST')

        <div class="form-group">
            <input type="text" class="form-control" value="{{ old('title') }}" name="title" placeholder="Title">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" value="{{ old('author') }}" name="author" placeholder="Author">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" value="{{ old('topic') }}" name="topic" placeholder="Topic">
        </div>
        <input type="submit" class="btn btn-danger" value="Add">
    </form>

@endsection