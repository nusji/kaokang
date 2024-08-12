<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'kaokang') }}</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/e9467d84bc.js" crossorigin="anonymous"></script>
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
                        <li class="nav-item">
                            <span class="nav-link">สวัสดี {{ Auth::user()->name }}</span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-danger" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
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
        <a href="{{ route('menus.index') }}"> <img src="{{ asset('images/nav/food.svg') }}" alt="ไอคอน"
                style="width: 30px"> เมนูข้าวแกง</a>
        <a href="#"><img src="{{ asset('images/nav/ingredients.svg') }}" alt="ไอคอน" style="width: 30px"></i>
            การผลิต</a>
        @if (Auth::user()->employee_role === 'owner')
            <a href="{{ route('employees.index') }}"><img src="{{ asset('images/nav/employee.svg') }}" alt="ไอคอน"
                    style="width: 30px"></i> พนักงาน</a>
            <a href="#"><img src="{{ asset('images/nav/payroll.svg') }}" alt="ไอคอน" style="width: 30px">
                เงินเดือนพนักงาน</a>
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
