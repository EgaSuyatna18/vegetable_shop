@extends('layouts.guest')
@section('content')
    <h1 class="text-decoration-underline" style="margin-top: 150px">Register</h1>
    <form action="/register" method="post" enctype="multipart/form-data" style="margin-bottom: 210px;">
        @csrf
        <div class="row justify-content-evenly">
            <div class="col-5">
                <div class="mb-3">
                    <label>First Name:</label>
                    <input type="text" name="first_name" class="form-control" max="25">
                </div>
                <div class="mb-3">
                    <label>Email:</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Gender:</label> <br>
                    <div class="row justify-content-evenly">
                        <div class="form-check form-check-inline col-auto">
                            <input class="form-check-input" type="radio" name="gender_id" value="1" id="male">
                            <label for="male">Male</label>
                        </div>
                        <div class="form-check form-check-inline col-auto">
                            <input class="form-check-input" type="radio" name="gender_id" value="2" id="female">
                            <label for="female">Female</label>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label>Password:</label>
                    <input type="password" name="password" class="form-control" min="8">
                </div>
            </div>
            <div class="col-5">
                <div class="mb-3">
                    <label>Last Name:</label>
                    <input type="text" name="last_name" class="form-control" max="25">
                </div>
                <div class="mb-3">
                    <label>Role:</label>
                    <select name="role_id" class="form-control">
                        <option value="">--Choose Role--</option>
                        <option value="1">Admin</option>
                        <option value="2">User</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Display Picture:</label>
                    <input class="form-control" type="file" name="display_picture_link">
                </div>
                <div class="mb-3">
                    <label>Confirm Password:</label>
                    <input type="password" name="confirm_password" class="form-control" min="8">
                </div>
            </div>
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-warning"><h1>Submit</h1></button><br>
                <a href="/login">Already have an account? click here to login</a>
            </div>
        </div>
    </form>
@endsection