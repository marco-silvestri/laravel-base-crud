@extends('layouts.main')

@section('main-content')
    <h1>Classrooms</h1>

    <section class="classrooms">
        <h2 class="text-danger">Students</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th></th>
                        <th></th>
                        <th></th>    
                    </tr>
                </thead>
                <tbody>
                    @foreach ($classrooms as $classroom)
                    <tr>
                        <td>{{  $classroom->id }}</td>
                        <td>{{ $classroom->name }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('classrooms.show', $classroom->id) }}">Show</a>
                        </td>
                        <td>Update</td>
                        <td>Delete</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </section>
@endsection