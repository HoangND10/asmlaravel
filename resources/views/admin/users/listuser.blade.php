@extends('admin.layoutadmin')
@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Manage Users</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover bg-white">
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Avatar</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>ChangePassword</th>
                        <th>Actions</th>
                        <th>
                            <a href="{{ route('admin.users.createu') }}" class="btn btn-primary">Thêm mới</a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->fullname }}</td>
                            <td>{{ $user->username }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $user->avatar) }}" width="50" alt="Avatar" class="img-thumbnail">
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>{{ $user->active ? 'Active' : 'Inactive' }}</td>
                            <td><a href="{{route('admin.password.change')}}" class="btn btn-primary">Password</a></td>
                            <td>
                                <form action="{{ route('admin.users.toggle', $user->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm {{ $user->active ? 'btn-warning' : 'btn-success' }}">
                                        {{ $user->active ? 'Deactivate' : 'Activate' }}
                                    </button>
                                </form>
                            </td>
                            <td class="d-flex gap-1">
                                <a href="{{route('user.editu', $user)}}" class="btn btn-primary">Edit</a>
                                <form action="{{route('user.destroyu', $user)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Bạn muốn xóa không?')" type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
