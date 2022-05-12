<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.css') }}">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

    </style>

    {{-- Scripts --}}
    <script src="{{ asset('/js/bootstrap.bundle.js') }}"></script>
</head>

<body class=" container-fluid bg-dark m-0 p-0">
    <header class="p-5">
        @include('components.navbar')
    </header>
    <div class="container-md p-5">
        @yield('content')
    </div>
    <footer>
        @include('components.footer')
    </footer>
</body>

</html>
