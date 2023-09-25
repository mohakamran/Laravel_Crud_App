<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-2r2M9pCqJsoO31Hzkz2+kwjcK13vXadlT1R9z8GpLdjl5mwgx5x2Aw5t4i3yDMtn9" crossorigin="anonymous">

</head>
<body>
    
<nav class="nav-bar">
     <div><a href="{{ route('admin-login') }}"><img class="logo" src="{{ asset('logo.png') }}"></a></div>
     <div>
            <ul>
                <li><a href="{{ route('add-student' )}}">Add Students</a></li>
                <li><a href="{{ route('view-students')}}">Manage Students</a></li>
                <li><a href="#">Manage Account</a></li>
            </ul>
      </div>
      <div>
          <a href="#" class="login">Logout</a>
      </div>
</nav>