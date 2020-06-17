@extends('layouts.main')

@section('main-content')
    <h1>Home</h1>

    <section class="students">
        <h2 class="text-danger">Students</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->age }}</td>
                        <td>{{ $student->gender }}</td>
                        <td>{{ $student->description }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </section>
@endsection