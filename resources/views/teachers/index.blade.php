@extends('layouts.main')

@section('main-content')
    @if (session('deleted'))
    <div class="alert alert-success">
        {{ session('deleted') }} successfully deleted
    </div>
    @endif
    <h1>Teachers</h1>

    <section class="teachers">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Age</th>
                        <th>CV Link</th>
                        <th></th>
                        <th></th>
                        <th></th>    
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teachers as $teacher)
                    <tr>
                        <td>{{ $teacher->id }}</td>
                        <td>{{ $teacher->name }}</td>
                        <td>{{ $teacher->surname }}</td>
                        <td>{{ $teacher->age }}</td>
                        <td>{{ $teacher->cv_link }}</td>
                        <td><a class="btn btn-primary" href="{{ route('teachers.show', $teacher->id) }}">Show</a></td>
                        <td><a class="btn btn-warning" href="{{ route('teachers.edit', $teacher->id) }}">Update</a></td>
                        <td>
                            <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-warning" type="submit" value="Delete">
                        </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </section>
@endsection