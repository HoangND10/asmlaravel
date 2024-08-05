@extends('admin.layoutadmin')
@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Danh sách Phones</h1>
    
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    
    <div class="card">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover bg-white">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Image</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Description</th>
                            <th scope="col">Category</th>
                            <th scope="col">
                                <a href="{{ route('create.phone') }}" class="btn btn-primary">Thêm mới</a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($phones as $phone)
                            <tr>
                                <td>{{ $phone->title }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $phone->image) }}" width="50" alt="" class="img-thumbnail">
                                </td>
                                <td>{{ $phone->price }}</td>
                                <td>{{ $phone->quantity }}</td>
                                <td>{{ $phone->description }}</td>
                                <td>{{ $phone->category ? $phone->category->name : 'null' }}</td>
                                <td class="d-flex gap-1">
                                    <a href="{{ route('phone.edit', $phone) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('phone.destroy', $phone) }}" method="POST">
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
    
    {{ $phones->links() }}
</div>

@endsection