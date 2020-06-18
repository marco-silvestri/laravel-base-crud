@extends('layouts.main')

@section('main-content')
    <h1>Teacher Editor</h1>
    
    @if ($errors->any())
    
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    
    @endif

    <form action="{{ route('teachers.update', $teacher->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" value="{{ old('name',$teacher->name) }}"
                name="name" placeholder="Name" id="name">
        </div>
        <div class="form-group">
            <label for="surname">Surname:</label>
            <input type="text" class="form-control" value="{{ old('surnname',$teacher->surname) }}"
                name="surname" placeholder="Surname" id="surname">
        </div>
        <div class="form-group">
            <label for="age">Age:</label>
            <input type="number" class="form-control" value="{{ old('age',$teacher->age) }}"
                name="age" placeholder="Age" id="age" min="18" max="65">
        </div>
        <div class="form-group">
            <label for="cv_link">Link to CV:</label>
            <input type="text" class="form-control" value="{{ old('cv_link',$teacher->cv_link) }}"
                name="cv_link" placeholder="Link to the CV" id="cv_link">
        </div>
        <input type="submit" class="btn btn-danger" value="Edit">
    </form>

@endsection