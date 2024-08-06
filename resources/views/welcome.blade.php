<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <!-- Styles -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div class="container">
        <h1 class="text-center">ไม่รู้จะทานอะไรใช่ไหม</h1>
        <h3 class="text-center">ให้เมี้ยวช่วยได้นะ</h3>
        <div class="d-flex justify-content-center mt-5">
            <form action="#" method="GET">
                <button type="submit" class="btn btn-primary btn-lg">เริ่ม</button>
            </form>
        </div>
    </div>
</body>


</html>
