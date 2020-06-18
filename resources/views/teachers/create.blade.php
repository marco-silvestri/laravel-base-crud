@extends('layouts.main')

@section('main-content')
    <h1>Add a teacher</h1>
    
    @if ($errors->any())
    
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    
    @endif

    <form action="{{ route('teachers.store') }}" method="POST">
        @csrf
        @method('POST')

        <div class="form-group">
            <input type="text" class="form-control" value="{{ old('name') }}" {{-- Old() stores the values temporarily 0in case of errors --}}
                name="name" placeholder="Name">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" value="{{ old('surname') }}"
                name="surname" placeholder="Surname">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" value="{{ old('age') }}"
                name="age" placeholder="Age">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" value="{{ old('cv_link') }}"
                name="cv_link" placeholder="Link to the CV">
        </div>
        <input type="submit" class="btn btn-danger" value="Add">
    </form>

@endsection