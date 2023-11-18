<meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ $title ?? 'Dashboard' }}</title>

    <!-- General CSS Files -->
   <link rel="stylesheet" href="{{ asset('assets/bs/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome-free/css/all.min.css') }}">

    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}/">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}/">
    @stack('styles')
    @vite('resources/js/app.js')
