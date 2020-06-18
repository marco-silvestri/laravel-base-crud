@extends('layouts.main')

@section('main-content')
    <h1 class="text-danger">Detail of {{ $classroom->name }}</h1>
    <ul class="list-group">
        <li class="list-group-item">
            ID: {{ $classroom->id }}
        </li>
        <li class="list-group-item">
            Description: {{ $classroom->description }}
        </li>
        <li class="list-group-item">
            Created: {{ $classroom->created_at }}
        </li>
        <li class="list-group-item">
            Update: {{ $classroom->updated_at }}
        </li>
    </ul>
    <div class="container d-flex">
        <a class="btn btn-warning" href="{{ route('classrooms.edit', $classroom->id) }}">Update</a>
        <form action="{{ route('classrooms.destroy', $classroom->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <input class="btn btn-danger" type="submit" value="Delete">
        </form>
    </div>

@endsection