@extends('layout')
@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Thông tin</h2>
    @auth
    <div class="card">
        <div class="card-header">
            {{ Auth::user()->fullname }}
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Username:</strong> {{ Auth::user()->username }}</li>
                <li class="list-group-item"><strong>Email:</strong> {{ Auth::user()->email }}</li>
                <li class="list-group-item">
                    <strong>Avatar:</strong>
                    @if(Auth::user()->avatar)
                        <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Avatar" class="img-fluid rounded-circle" width="100" height="100">
                    @else
                        <p>No Avatar</p>
                    @endif
                </li>
                <li class="list-group-item"><strong>Role:</strong> {{ Auth::user()->role }}</li>
                <li class="list-group-item"><strong>Active:</strong> {{ Auth::user()->active ? 'Active' : 'Inactive' }}</li>
            </ul>
            <a href="{{route('user.edit')}}" class="btn btn-primary mt-3">Edit</a>
            <a href="{{route('password.change')}}" class="btn btn-primary mt-3">Password</a>
            {{-- @if(Auth::user()->role === 'admin')
                <a href="{{ route('admin.users.index') }}" class="btn btn-secondary mt-3">Manage Users</a>
            @endif --}}
        </div>
    </div>
    @endauth
</div>
@endsection