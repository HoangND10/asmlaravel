@extends('admin.layoutadmin')
@section('content')
<div class="container m-4">
        <h1>Update điện thoại</h1>
        @if (session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
        @endif
        <a href="{{route('phone.index')}}" class="btn btn-primary">List</a>
        <form action="{{route('phone.update', $phone)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" value="{{$phone->title}}">
            </div>
            <div class="mb-3">
                <label for="form-label" class="form-label">Image</label>
                <input class="form-control" type="file" name="image" id="fileImage">
                <img id="img" src="{{asset('/storage/'.$phone->image)}}" width="60" alt="{{$phone->title}}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Description</label>
                <textarea class="form-control" rows="3" name="description">{{$phone->description}}</textarea>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Price</label>
                <input type="number" name="price" class="form-control" id="" value="{{$phone->price}}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Quantity</label>
                <input type="number" name="quantity" class="form-control" id="" value="{{$phone->quantity}}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Category</label>
                <select name="cate_id" class="form-select" id="">
                    @foreach ($categories as $cate)
                        <option value="{{$cate->id}}" 
                            @if ($cate->id == $phone->cate_id)
                                selected
                            @endif
                        >
                            {{$cate->name}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb3">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('phone.index') }}" class="btn btn-success">List</a>
            </div>
        </form>
    </div>
    <script>
        var fileImage = document.querySelector('#fileImage');
        var img = document.querySelector('#img')

        //thay đổi ảnh
        fileImage.addEventListener('change', function(e){
            e.preventDefault();
            img.src = URL.createObjectURL(this.files[0]);
        })
    </script>
@endsection