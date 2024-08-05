@extends('admin.layoutadmin')
@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Danh sách Categories</h1>
    
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
                            <th scope="col">Name</th>
                            <th scope="col">
                                <a href="{{ route('create.cate') }}" class="btn btn-primary">Thêm mới</a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td class="d-flex gap-1">
                                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('category.destroy', $category->id) }}" method="POST">
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
    
    {{-- {{ $categories->links() }} --}}
</div>

@endsection