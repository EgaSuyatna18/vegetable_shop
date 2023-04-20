@extends('layouts.dashboard')
@section('content')
    <div style="min-height: 800px;" class="py-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" class="text-center">Account</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($accounts as $account)
                    <tr>
                        <td class="text-center">{{ $account->first_name . ' ' . $account->last_name . ' - ' . $account->role->role_name}}</td>
                        <td class="d-flex justify-content-evenly">
                            <a href="/update/role/{{ $account->id }}">Update Role</a>
                            <a href="/delete/{{ $account->id }}" onclick="return confirm('Delete Account?')">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection