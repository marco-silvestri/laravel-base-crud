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
                        <th>Book ID</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Topic</th>
                        <th></th>
                        <th></th>
                        <th></th>    
                    </tr>
                </thead>
                <tbody>
                    @foreach ($textBooks as $textBook)
                    <tr>
                        <td>{{ $textBook->id }}</td>
                        <td>{{ $textBook->title }}</td>
                        <td>{{ $textBook->author }}</td>
                        <td>{{ $textBook->topic }}</td>
                        <td><a class="btn btn-primary" href="{{ route('textbooks.show', $textBook->id) }}">Show</a></td>
                        <td><a class="btn btn-warning" href="{{ route('textbooks.edit', $textBook->id) }}">Update</a></td>
                        <td>
                            <form action="{{ route('textbooks.destroy', $textBook->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-danger" type="submit" value="Remove">
                        </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </section>
@endsection