<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body {
            background: url('https://img.freepik.com/free-vector/abstract-watercolor-pastel-background_87374-139.jpg') no-repeat center center fixed;
            background-size: cover;
        }
        .nav-icons {
            display: flex;
            align-items: center;
        }
        .nav-icons .icon {
            margin-left: 15px;
            font-size: 1.25rem;
            color: #333;
        }
        .nav-link {
            color: black !important;
        }
        .nav-link:hover {
            color: blue !important;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="https://intriphat.com/wp-content/uploads/2024/04/logo-cua-hang-dien-thoai-1.jpg" alt="Logo" style="height: 70px;">
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Trang chủ</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="phonesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Điện thoại
                        </a>
                        <div class="dropdown-menu" aria-labelledby="phonesDropdown">
                            @foreach ($categories as $cate)
                                <a class="dropdown-item" href="{{ route('dm', $cate->id) }}">{{$cate->name}}</a>
                            @endforeach
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Laptop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tin tức</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Giỏ hàng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Hỗ trợ</a>
                    </li>
                </ul>
            </div>
            <div class="nav-icons ml-auto">
                <a href="#" class="icon" title="Search"><i class="bi bi-search"></i></a>
                <a href="#" class="icon" title="Cart"><i class="bi bi-cart"></i></a>
                <div class="dropdown">
                    <a href="#" class="icon" title="Login" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bi bi-person"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                        @auth
                            <a class="dropdown-item" href="{{route('user.all')}}">Thông tin</a>
                            @if(Auth::user()->role == 'admin')
                                <a class="dropdown-item" href="{{route('admin.dashboard')}}">Quản trị</a>
                            @endif
                            <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                        @else
                            <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 p-0">
                <img src="https://img3.thuthuatphanmem.vn/uploads/2019/10/08/banner-quang-cao-dien-thoai_103211774.jpg" width="100%" class="img-fluid" alt="Banner">
            </div>
        </div>
    </div>

    @yield('content')
    <!-- resources/views/footer.blade.php -->
    <footer class="bg-light text-white py-3 mt-1">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="footer-logo">
                <img src="https://intriphat.com/wp-content/uploads/2024/04/logo-cua-hang-dien-thoai-1.jpg" width="100" alt="Logo" class="img-fluid">
            </div>
            <div class="footer-links">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item"><a href="#" class="text-black">Link 1</a></li>
                    <li class="list-inline-item"><a href="#" class="text-black">Link 2</a></li>
                    <li class="list-inline-item"><a href="#" class="text-black">Link 3</a></li>
                </ul>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
