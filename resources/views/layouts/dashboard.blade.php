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
            <a href="/logout" class="btn btn-warning" style="background-color: #FADF54;">logout</a>
        </div>
        <div class="w-100 d-flex justify-content-evenly" style="background-color: #FADF54;">
            <a href="/home" class="text-decoration-none"><h3 class="d-inline text-dark">Home</h3></a>
            <a href="/cart" class="text-decoration-none"><h3 class="d-inline text-dark">Cart</h3></a>
            <a href="/profile" class="text-decoration-none"><h3 class="d-inline text-dark">Profile</h3></a>
            @if (auth()->user()->role_id == 1)
                <a href="/account" class="text-decoration-none"><h3 class="d-inline text-dark">Account Management</h3></a>
            @endif
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