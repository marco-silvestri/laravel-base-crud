@extends('layouts.main')

@section('main-content')
    <h1>Create a Classroom</h1>
    
    @if ($errors->any())
    
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    
    @endif

    <form action="{{ route('classrooms.store') }}" method="POST">
        @csrf
        @method('POST')

        <div class="form-group">
            <input type="text" class="form-control" value="{{ old('name') }}" {{-- Get the old value as a default --}}
                name="name" placeholder="Class name">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" value="{{ old('description') }}"
                name="description" placeholder="Class description">
        </div>
        <input type="submit" class="btn btn-danger" value="Create">
    </form>

@endsection