@extends('layouts.main')

@section('main-content')
    <h1 class="text-danger">Detail of {{ $teacher->name }} {{ $teacher->surname }}</h1>
    <ul class="list-group">
        <li class="list-group-item">
            ID: {{ $teacher->id }}
        </li>
        <li class="list-group-item">
            Name: {{ $teacher->name }}
        </li>
        <li class="list-group-item">
            Surname: {{ $teacher->surname }}
        </li>
        <li class="list-group-item">
            Age: {{ $teacher->age }}
        </li>
        <li class="list-group-item">
            Link to CV: {{ $teacher->cv_link }}
        </li>
        <li class="list-group-item">
            Created: {{ $teacher->created_at }}
        </li>
        <li class="list-group-item">
            Update: {{ $teacher->updated_at }}
        </li>
    </ul>
    <div class="container d-flex">
        <a class="btn btn-warning" href="{{ route('teachers.edit', $teacher->id) }}">Update</a>
        <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <input class="btn btn-danger" type="submit" value="Delete">
        </form>
    </div>

@endsection