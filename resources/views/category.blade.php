{{-- @extends('layout')
@section('content')
    <div class="container mt-5">
        <h2>Hãng: {{ $categoryName }}</h2>
        <div class="row">
            @foreach($phones as $phone)
                <div class="col-md-3 mb-3">
                    <div class="card h-100">
                        <img src="{{ $phone->image }}" class="card-img-top" alt="{{ $phone->title }}">
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
    </div>
@endsection --}}

@extends('layout')
@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h3>Hãng: {{ $categoryName }}</h3>
                </div>
                <ul class="list-group list-group-flush">
                    @foreach ($categories as $cate)
                        <li class="list-group-item"><a href="{{ route('dm', $cate->id) }}">{{$cate->name}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                @foreach($phones as $phone)
                    <div class="col-md-4 mb-3">
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
        </div>
    </div>
</div>
@endsection
