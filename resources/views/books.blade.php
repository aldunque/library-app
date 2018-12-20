<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Simple Library App</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('css/custom-sub.css')}}" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div id="wrapper">
         <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    Add New Book
                </li>
            </ul>
             <form action="/students/add" method="post" accept-charset="UTF-8" class="form">
            <label for="name">Book name:</label>
            <input class="form-control" type="text" name="name" id="name" value="">
            <label for="number_of_pages">Page number:</label>
            <input class="form-control" type="number" name="number_of_pages" id="numberOfPages" value="">
            <button type="submit" class="btn btn-success">Add New Book</button>
        </form>
        </div>
        <!-- /#sidebar-wrapper -->
            <!-- Page Content -->
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <h1>A Simple Library App - List of Books</h1>
                    <ul class="book-list">
                @foreach ($books as $book)
                    <li>
                        <img src="https://placeimg.com/150/200/any" height="150" width="200"><br>
                        <h3><strong>{{ $book->name }}</strong>, <i>{{ $book->number_of_pages }} pages</i></h3>

                        <form action="/api/books/{{$book->id}}" method="post" accept-charset="UTF-8" class="form">
                            <input name="_method" type="hidden" value="PUT">
                            <label for="name">Book name:</label>
                            <input class="form-control" type="text" name="name" id="name" value="" placeholder="{{ $book->name }}">
                            <label for="number_of_pages">Page number:</label>
                            <input class="form-control" type="number" name="number_of_pages" id="numberOfPages" value="" placeholder="{{ $book->number_of_pages }}">
                            <button type="submit" class="btn btn-primary">Edit Book</button>
                        </form>

                        <form action="/api/books/{{$book->id}}" method="post" accept-charset="UTF-8" class="form">
                            <input name="_method" type="hidden" value="DELETE"/>
                            <button type="submit" class="btn btn-danger">Delete Book</button>
                        </form>

                        <p><a href=""></a></p>
                        @if ($book->borrowed_by)
                            <p>Borrowed by: {{ $book->borrowed_by}}</p>
                            <p>Borrowed at: {{ $book->borrowed_at}}</p>
                            <p>Return this book if you have it(input your student number)</p>
                            <form action="/api/books/returnBook/{{$book->id}}" method="post">
                                <label for="student_number">Your Student Number:</label>
                                <input class="form-control" type="number" name="student_number" id="studentNumber" value="">
                                <button type="submit" class="btn btn-warning">Return Book</button>
                            </form>
                        @else
                        <p>Borrow this book (input your student number)</p>
                        <form action="/api/books/borrow/{{$book->id}}" method="post">
                            <label for="student_number">Your Student Number:</label>
                            <input class="form-control" type="number" name="student_number" id="studentNumber" value="">
                            <button type="submit" class="btn btn-info">Borrow Book</button>
                        </form>
                        @endif

                        @if ($book->returned_at)
                            <p>Last returned at: {{ $book->returned_at}}</p>
                        @endif 
                        
                    </li>
                @endforeach
                </ul>
                </div>
            </div>
        <!-- /#page-content-wrapper -->

        </div>
         <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    </body>
</html>