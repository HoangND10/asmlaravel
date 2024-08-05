@extends('admin.layoutadmin')
@section('content')
    <div class="container m-4">
        <h1>Thêm mới loại điện thoại</h1>
        <a href="{{route('cate')}}" class="btn btn-primary">List</a>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('store.cate')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="{{old('name')}}">
                @error('name')
                    <span style="color: red">{{$message}}</span>
                @enderror
            </div>
            <div class="mb3">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('cate') }}" class="btn btn-success">List</a>
            </div>
        </form>
    </div>
@endsection