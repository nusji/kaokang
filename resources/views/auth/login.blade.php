<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600&display=swap" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body, html {
            height: 100%;
            font-family: 'Kanit', sans-serif;
            background-color: #e6f3f0;
        }
        .main-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100%;
            padding: 20px;
        }
        .login-container {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            overflow: hidden;
            width: 100%;
            max-width: 900px;
        }
        .illustration {
            background-color: #ffffff;
            padding: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .illustration img {
            max-width: 100%;
            height: auto;
        }
        .login-form {
            padding: 40px;
        }
        .form-control {
            border-radius: 8px;
            padding: 12px;
        }
        .btn-primary {
            background-color: #07a189;
            border-color: #07a189;
            border-radius: 8px;
            padding: 12px;
            font-weight: 500;
        }
        .btn-primary:hover {
            background-color: #058d78;
            border-color: #058d78;
        }
        @media (max-width: 767px) {
            .login-container {
                margin: 15px;
            }
            .illustration {
                padding: 20px;
            }
            .login-form {
                padding: 30px;
            }
        }
    </style>
</head>

<body>
    <div class="main-container">
        <div class="login-container">
            <div class="row g-0">
                <div class="col-md-6 illustration">
                    <img src="{{ asset('images/loginlogo.svg') }}" alt="Illustration" class="img-fluid">
                </div>
                <div class="col-md-6 login-form">
                    <h3 class="text-center mb-4">เข้าสู่ระบบ</h3>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="รหัสผู้ใช้งาน">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="รหัสผ่าน">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="d-grid gap-2 mb-3">
                            <button type="submit" class="btn btn-primary">
                                {{ __('เข้าใช้งาน') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if(session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'เกิดข้อผิดพลาด',
                text: '{{ session('error') }}'
            });
        </script>
    @endif
</body>
</html>