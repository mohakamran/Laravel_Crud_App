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
</head>
<body>
    
<nav class="nav-bar">
     <div><a href="{{ route('homepage') }}"><img class="logo" src="{{ asset('logo.png') }}"></a></div>
     <div>
            <ul>
                <li><a href="#">All</a></li>
                <li><a href="#">Class 9</a></li>
                <li><a href="#">Class 10</a></li>
                <li><a href="#">Class 11</a></li>
                <li><a href="#">Class 12</a></li>
            </ul>
      </div>
      <div>
          <a href="{{ route('login-app') }}" class="login">Login</a>
      </div>
</nav>