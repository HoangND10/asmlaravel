@extends('layout')

@section('content')
<div class="container mt-5">
    <div class="row">
        <!-- Hình ảnh sản phẩm và thông tin sản phẩm -->
        <div class="col-md-6">
            <div class="card mb-4">
                <img src="{{ asset('storage/' . $phone->image) }}" width="100" height="500" class="card-img-top" alt="{{ $phone->title }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    <h1 class="card-title">{{ $phone->title }}</h1>
                    <p class="card-text"><strong>Hãng:</strong> {{ $phone->name }}</p>
                    <p class="card-text"><strong>Giá bán:</strong> {{ number_format($phone->price, 2) }} VND</p>
                    <p class="card-text"><strong>Số lượng:</strong> {{ $phone->quantity }}</p>
                    <p class="card-text"><strong>Mô tả:</strong></p>
                    <p class="card-text">{{ $phone->description }}</p>
                    
                    <!-- Nút thêm vào giỏ hàng -->
                    <form action="#" method="POST">
                        @csrf
                        <input type="hidden" name="phone_id" value="{{ $phone->id }}">
                        <button type="submit" class="btn btn-primary">Thêm vào giỏ hàng</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Phần sản phẩm cùng loại -->
    <div class="row mb-4">
        <div class="col-md-12">
            <h3>Sản phẩm cùng loại</h3>
            <div class="row">
                @foreach($relatedProducts as $relatedProduct)
                    <div class="col-md-3 mb-4">
                        <div class="card">
                            <img src="{{ asset('storage/' . $relatedProduct->image) }}" width="100" height="250" class="card-img-top" alt="{{ $relatedProduct->title }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $relatedProduct->title }}</h5>
                                <p class="card-text">{{ number_format($relatedProduct->price, 2) }} VND</p>
                                <a href="/phone/{{ $relatedProduct->id }}" class="btn btn-primary">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Phần bình luận -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Thêm bình luận</h4>
                </div>
                <div class="card-body">
                    <!-- Form thêm bình luận -->
                    <form action="#" method="POST">
                        @csrf
                        <input type="hidden" name="phone_id" value="{{ $phone->id }}">
                        <div class="form-group">
                            <label for="content">Nội dung bình luận:</label>
                            <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Gửi bình luận</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
