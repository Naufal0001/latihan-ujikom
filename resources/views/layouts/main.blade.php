<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    @vite(['resources/sass/app.scss'])
</head>
<body>
    <div class="wrapper">
        @include('partials.sidebar')
        <div class="main">
            @include('partials.navbar')
            <main class="content">
                @yield('content')
            </main>
            <footer class="footer">
                @include('partials.footer')
            </footer>
        </div>
    </div>
    @vite(['resources/js/app.js'])
</body>
</html>