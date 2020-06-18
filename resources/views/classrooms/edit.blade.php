@extends('layouts.main')

@section('main-content')
    <h1>Classroom Editor</h1>
    
    @if ($errors->any())
    
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    
    @endif

    <form action="{{ route('classrooms.update', $classroom->id) }}" method="POST">
        @csrf
        @method('PATCH') {{-- Updates only some fields --}}

        <div class="form-group">
            <label for="name">Class name:</label>
            <input type="text" class="form-control" value="{{ old('name',$classroom->name) }}"
                name="name" placeholder="Class name" id="name">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <input type="text" class="form-control" value="{{ old('description',$classroom->description) }}" {{-- Switch between old and current value --}}
                name="description" placeholder="Class description" id="description">
        </div>
        <input type="submit" class="btn btn-danger" value="Edit">
    </form>

@endsection