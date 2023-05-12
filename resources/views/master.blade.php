<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Actual Page</title>
    <link rel="stylesheet" href="{{asset('mycss/style.css')}}">
</head>
<body>
    <nav class="navbar">
        <ul class="menu">
            <li><a href="/">Home</a></li>
            <li><a href="">About</a></li>
            <li><a href="/register">Register</a></li>
            <li><a href="/login">Login</a></li>
        </ul>
    </nav>

    @yield('content')

    <footer class="footer">
        <p>This is footer</p>
    </footer>

    
</body>
</html>