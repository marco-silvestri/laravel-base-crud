@extends('layouts.main')

@section('main-content')
    <h1>Text Books editor</h1>
    
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('textbooks.update', $textBook->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" value="{{ old('title',$textBook->title) }}"
                name="title" placeholder="Title" id="title">
        </div>
        <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" class="form-control" value="{{ old('author',$textBook->author) }}"
                name="author" placeholder="Author" id="author">
        </div>
        <div class="form-group">
            <label for="topic">Topic:</label>
            <input type="text" class="form-control" value="{{ old('topic',$textBook->topic) }}"
                name="topic" placeholder="Topic" id="topic">
        </div>
        <input type="submit" class="btn btn-danger" value="Edit">
    </form>

@endsection