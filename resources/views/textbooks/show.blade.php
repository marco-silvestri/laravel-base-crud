@extends('layouts.main')

@section('main-content')
    <h1 class="text-danger">Detail of {{ $textBook->title }} by {{ $textBook->author }}</h1>
    <ul class="list-group">
        <li class="list-group-item">
            ID: {{ $textBook->id }}
        </li>
        <li class="list-group-item">
            Title: {{ $textBook->title }}
        </li>
        <li class="list-group-item">
            Author: {{ $textBook->author }}
        </li>
        <li class="list-group-item">
            Topic: {{ $textBook->topic }}
        </li>
    </ul>
    <div class="container d-flex">
        <a class="btn btn-warning" href="{{ route('textbooks.edit', $textBook->id ) }}">Update</a>
        <form action="{{ route('textbooks.destroy', $textBook->id ) }}" method="POST">
            @csrf
            @method('DELETE')
            <input class="btn btn-danger" type="submit" value="Delete">
        </form>
    </div>

@endsection