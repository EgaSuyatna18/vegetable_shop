@extends('layouts.dashboard')
@section('content')
    <div class="w-25" style="min-height: 750px;">
        <h3 class="my-5">{{ $account->first_name . ' ' . $account->last_name }}</h3>
        <form action="/update/role" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $account->id }}">
            <div class="mb-3">
                <label>Role:</label>
                <select name="role_id" class="form-control">
                    <option value="">--Choose Role--</option>
                    <option value="1">Admin</option>
                    <option value="2">User</option>
                </select>
            </div>
            <button type="submit" class="btn btn-warning">Submit</button>
        </form>
    </div>
@endsection