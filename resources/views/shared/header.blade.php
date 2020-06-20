<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="navbar-brand">MySchool</div>
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                <div class="dropdown m-1">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Classrooms
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li class="nav-item"><a class="nav-link" href="{{ route('classrooms.index') }}">List of Classrooms</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('classrooms.create')}}">Create a Classroom</a></li>
                    </div>
                </div>
                <div class="dropdown m-1">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Teachers
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li class="nav-item"><a class="nav-link" href="{{ route('teachers.index')}}">List all Teachers</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('teachers.create')}}">Add a Teacher</a></li>
                    </div>
                </div>
                <div class="dropdown m-1">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Textbook
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li class="nav-item"><a class="nav-link" href="{{ route('textbooks.index')}}">Text Books</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('textbooks.create')}}">Add a Book</a></li>
                    </div>
                </div>
            </ul>
        </nav>
    </header>


    