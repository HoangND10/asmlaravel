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
                <h1>ADMIN</h1>
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.dashboard')}}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('phone.index')}}">Phones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('cate')}}">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.users.index')}}">User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/">Back</a>
                    </li>
                </ul>
            </div>
            {{-- <div class="nav-icons ml-auto">
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
                                <a class="dropdown-item" href="">Quản trị</a>
                            @endif
                            <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                        @else
                            <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                        @endauth
                    </div>
                </div>
            </div> --}}
        </div>
    </nav>
    @yield('content')
    <!-- resources/views/footer.blade.php -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
