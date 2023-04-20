@extends('layouts.guest')
@section('content')
<div class="row">
    <div class="col-4 offset-4">
            <h1 class="text-decoration-underline mb-5" style="margin-top: 150px;">Login</h1>
            <form action="/authenticate" method="post" style="margin-bottom: 330px;">
                @csrf
                <div class="mb-3">
                    <label>Email Address:</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Password:</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-warning"><h1>Submit</h1></button> <br>
                    <a href="/register">Don't have an account? click here to sign up</a>
                </div>
            </form>
        </div>
    </div>
@endsection