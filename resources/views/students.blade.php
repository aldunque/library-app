@extends('layout.master')

@section('custom-script')
    <link href="{{asset('css/custom-sub.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('sidebar')
<h4>Add New User</h4>
    <form action="/students/add" method="post" accept-charset="UTF-8" class="form">
        {{ csrf_field() }}
        <label for="name">Student name:</label>
        <input class="form-control" type="text" name="name" id="name" value="">
        <label for="student_number">Student number:</label>
        <input class="form-control" type="number" name="student_number" id="studentNumber" value="">
        <button type="submit" class="btn btn-success">Add New Student</button>
    </form>
@endsection

@section('content')
    <div class="title m-b-md">
        A Simple Library App - List of Students
    </div>

    <ul class="item-list">
    @foreach ($users as $user)
        <li>
            <img src="https://placeimg.com/150/200/people/grayscale" height="150" width="200"><br>
            <h3><strong>{{ $user->name }}</strong>, [{{ $user->student_number }}]</h3>

            <form action="/api/users/{{$user->id}}" method="post" accept-charset="UTF-8" class="form">
                    {{ csrf_field() }}
                <input name="_method" type="hidden" value="PUT">
                <label for="name">Student name:</label>
                <input class="form-control" type="text" name="name" id="name" value="" placeholder="{{ $user->name }}">
                <label for="student_number">Student number:</label>
                <input class="form-control" type="number" name="student_number" id="studentNumber" value="" placeholder="{{ $user->student_number }}">
                <button type="submit" class="btn btn-primary">Edit Student</button>
            </form>

            <form action="/api/users/{{$user->id}}" method="post" accept-charset="UTF-8" class="form">
                <input name="_method" type="hidden" value="DELETE"/>
                <button type="submit" class="btn btn-danger">Delete Student</button>
            </form>
        </li>
    @endforeach
    </ul>
@endsection