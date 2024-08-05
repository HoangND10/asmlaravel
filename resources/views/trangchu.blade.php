@extends('layout')
@section('content')
    <div class="container mt-5">
        <h3>Sản phẩm mới nhất</h3>
        <div class="row">
            @foreach($phones as $phone)
                <div class="col-md-3 mb-3">
                    <div class="card h-100">
                        <img src="{{ asset('storage/' . $phone->image) }}" width="100" height="250" class="card-img-top" alt="{{ $phone->title }}">
                        <div class="card-body">
                            <a href="{{ route('show', $phone->id) }}" class="phone-link">
                                <div class="phone-title"><h5 class="card-title">{{ $phone->title }}</h5></div>
                            </a>
                            <p class="card-text">Giá: {{ $phone->price }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <h3>Tất cả sản phẩm</h3>
        <div class="row">
            @foreach($phones1 as $phone1)
                <div class="col-md-3 mb-3">
                    <div class="card h-100">
                        <img src="{{ asset('storage/' . $phone1->image) }}" width="100" height="250" class="card-img-top" alt="{{ $phone1->title }}">
                        <div class="card-body">
                            <a href="{{ route('show', $phone1->id) }}" class="phone-link">
                                <div class="phone-title"><h5 class="card-title">{{ $phone1->title }}</h5></div>
                            </a>
                            <p class="card-text">Giá: {{ $phone1->price }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
