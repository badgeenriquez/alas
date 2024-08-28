<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','New Title')</title>
    <link rel="stylesheet" href="{{ asset('css/custom.css')  }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/icons.css')  }}"> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">


    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @livewireStyles

</head>
<body class="bg-slate-700">

     @yield('content')
        
    
   
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}" type="text/javascript"></script>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    

    @livewireScripts
    
</body>
</html>