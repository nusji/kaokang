<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts --> <!-- Include Bootstrap CSS for styling -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    {{-- <link id="bootstrap-css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous">
    <script id="bootstrap-js" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://kit.fontawesome.com/e9467d84bc.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
    --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/e9467d84bc.js" crossorigin="anonymous"></script>
    <style>
        body {
            padding-top: 56px;
            /* Height of the navbar */
            font-family: 'Kanit', sans-serif;
        }

        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            color: tomato;
        }

        .navbar a {
            color: black;
        }

        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 56px;
            /* Below the navbar */
            left: 0;
            background-color: #438854;
            padding-top: 20px;
            z-index: 900;
        }

        .sidebar a {
            padding: 15px;
            text-decoration: none;
            font-size: 16px;
            color: white;
            display: block;
        }

        .sidebar a:hover {
            background-color: #575d63;
            font-size: 16px
        }

        .main-content {
            margin-left: 260px;
            /* Same as the width of the sidebar */
            padding: 20px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <img src="{{ asset('images/logo.svg') }}" alt="logo" style="height: 40px; margin-right: 20px;">
            <a class="navbar-brand" href="#">
                {{ config('app.name') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                สวัสดี {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <div class="sidebar">
        <a href="#"><i class="fa-solid fa-chart-line"></i> แดชบอร์ด</a>
        <a href="#"><i class="fas fa-shopping-cart"></i> จัดการขาย</a>
        <hr>
        <a href="{{ route('ingredients') }}"><img src="{{ asset('images/nav/ingredients.svg') }}" alt="ไอคอน"
           style="width: 30px">
            วัตถุดิบ</a>
        <a href="#"><img src="{{ asset('images/nav/ingredients.svg') }}" alt="ไอคอน" style="width: 30px">
            สั่งซื้อวัตถุดิบ</a>
        <a href="{{ route('menus.index') }}"> <img src="{{ asset('images/nav/food.svg') }}" alt="ไอคอน" style="width: 30px"> เมนูข้าวแกง</a>
        <a href="#"><img src="{{ asset('images/nav/ingredients.svg') }}" alt="ไอคอน" style="width: 30px"></i> การผลิต</a>
        @if (Auth::user()->employee_role === 'owner')
            <a href="{{route('employees.index')}}"><img src="{{ asset('images/nav/employee.svg') }}" alt="ไอคอน" style="width: 30px"></i> พนักงาน</a>
            <a href="#"><img src="{{ asset('images/nav/payroll.svg') }}" alt="ไอคอน" style="width: 30px"> เงินเดือนพนักงาน</a>
        @endif
        <a href="#"><i class="fas fa-shopping-cart"></i> รายงานและสถิติ</a>
        <hr>
        <a href="#"><i class="fas fa-book icon"></i> จัดสรรเมนู</a>
    </div>

    <div class="main-content">
        <main>
            <div class="container mt-4">
                @yield('content')
            </div>
        </main>
    </div>

    <footer>
        @yield('footer')
    </footer>
</body>

</html>
