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
            <input type="text" class="form-control"
                name="name" placeholder="Name">
        </div>
        <div class="form-group">
            <input type="text" class="form-control"
                name="surname" placeholder="Surname">
        </div>
        <div class="form-group">
            <input type="text" class="form-control"
                name="age" placeholder="Age">
        </div>
        <div class="form-group">
            <input type="text" class="form-control"
                name="cv_link" placeholder="Link to the CV">
        </div>
        <input type="submit" class="btn btn-danger" value="Add">
    </form>

@endsection