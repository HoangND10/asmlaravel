@extends('admin.layoutadmin')
@section('content')
    <div class="container m-4">
        <h1>Thêm mới bài viết</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('store.phone')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" value="{{old('title')}}">
                @error('title')
                    <span style="color: red">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="form-label" class="form-label">Image</label>
                <input class="form-control" type="file" name="image">
                @error('image')
                    <span style="color: red">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Description</label>
                <textarea class="form-control" rows="3" name="description">{{old('description')}}</textarea>
                @error('description')
                    <span style="color: red">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Price</label>
                <input type="number" name="price" class="form-control" id="" value="{{old('price')}}">
                @error('price')
                    <span style="color: red">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Quantity</label>
                <input type="number" name="quantity" class="form-control" id="" value="{{old('quantity')}}">
                @error('quantity')
                    <span style="color: red">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Category</label>
                <select name="cate_id" class="form-control" id="">
                    @foreach ($categories as $cate)
                        <option value="{{$cate->id}}"
                            @if ($cate->id == old('cate_id'))
                                selected
                            @endif    
                        >
                            {{$cate->name}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb3">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('phone.index') }}" class="btn btn-success">List</a>
            </div>
        </form>
    </div>
@endsection