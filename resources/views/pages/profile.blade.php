@extends('layouts.dashboard')
@section('content')
<div class="text-end mt-3">
    <a href="/profile/en" class="btn btn-warning mx-1">English</a>
    <a href="/profile/id" class="btn btn-warning mx-1">Bahasa</a>
</div>
<form action="/edit_profile" method="post" style="margin-top: 200px; margin-bottom: 180px;">
    @csrf
    <div class="row justify-content-evenly">
        <div class="col-2">
            <img src="{{ asset('storage/' . auth()->user()->display_picture_link) }}" class="w-100 h-100 img-fluid">
        </div>
        <div class="col-4">
            <div class="mb-3">
                <label>@lang('profile.first_name')</label>
                <input type="text" name="first_name" class="form-control" max="25">
            </div>
            <div class="mb-3">
                <label>@lang('profile.email')</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="mb-3">
                <label>@lang('profile.gender')</label> <br>
                <div class="row justify-content-evenly">
                    <div class="form-check form-check-inline col-auto">
                        <input class="form-check-input" type="radio" name="gender_id" value="1" id="male">
                        <label for="male">@lang('profile.male')</label>
                    </div>
                    <div class="form-check form-check-inline col-auto">
                        <input class="form-check-input" type="radio" name="gender_id" value="2" id="female">
                        <label for="female">@lang('profile.female')</label>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label>@lang('profile.password')</label>
                <input type="password" name="password" class="form-control" min="8">
            </div>
        </div>
        <div class="col-4">
            <div class="mb-3">
                <label>@lang('profile.last_name')</label>
                <input type="text" name="last_name" class="form-control" max="25">
            </div>
            <div class="mb-3">
                <label>@lang('profile.role')</label>
                <select name="role_id" class="form-control">
                    <option value="">--Choose Role--</option>
                    <option value="1">Admin</option>
                    <option value="2">User</option>
                </select>
            </div>
            <div class="mb-3">
                <label>@lang('profile.display_picture')</label>
                <input class="form-control" type="file" name="display_picture_link" onchange="dpchange(this)" form="dpForm">
            </div>
            <div class="mb-3">
                <label>@lang('profile.confirm_password')</label>
                <input type="password" name="confirm_password" class="form-control" min="8">
            </div>
        </div>
        <div class="col-12 text-center">
            <button type="submit" class="btn btn-warning"><h1>Save</h1></button><br>
        </div>
    </div>
</form>

<form action="/dpchange" method="post" enctype="multipart/form-data" id="dpForm">
    @csrf
</form>

<script>
    function dpchange(photo) {
        dpForm.submit();
    }
</script>
@endsection