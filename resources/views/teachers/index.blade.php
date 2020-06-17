@extends('layouts.main')

@section('main-content')
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
                        <td>Update</td>
                        <td>Delete</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </section>
@endsection