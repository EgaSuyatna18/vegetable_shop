<!DOCTYPE html>
<head>
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="/assets/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="row" style="background-color: #AFE9D0">
        <div class="col-7 text-end">
            <h1>Amazing E-Grocery</h1>
        </div>
        <div class="col-5 text-center mt-2">
            <a href="/register" class="btn" style="background-color: #FADF54">Register</a>
            <a href="/login" class="btn" style="background-color: #FADF54">Login</a>
        </div>
    </nav>
    <div class="container mx-auto">
        @yield('content')
    </div>
    <footer class="text-center py-2" style="background-color: #AFE9D0">
        <h3>@ Amazing E-Grocery 2023</h3>
    </footer>
    <script src="/assets/bootstrap/dist/js/bootstrap.min.js"></script>
    @extends('layouts.errorModal')
</body>
</html>