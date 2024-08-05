@extends('admin.layoutadmin')
@section('content')
<div class="container m-4">
        <h1>Update Loại điện thoại</h1>
        @if (session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
        @endif
        <a href="{{route('cate')}}" class="btn btn-primary">List</a>
        <form action="{{route('category.update', $category)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="{{$category->name}}">
            </div>
            <div class="mb3">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('cate') }}" class="btn btn-success">List</a>
            </div>
        </form>
    </div>
@endsection