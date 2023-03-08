<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
       
        <link rel="stylesheet" href="{{asset('front/assets/css/bootstrap.min.css')}}">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.5.1/fullcalendar.min.css" />
        <script src="{{asset('front/assets/js/jquery-3.6.3.min.js')}}"></script>

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.3/moment.min.js" ></script>
        <script type="text/javascript"src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.5.1/fullcalendar.min.js" integrity="sha512-7IbO+IEofZ03ixCjeRlF6cSHn50WA1m2sfc8hW2lWK6YVjrvKu+pZ2hNBHYEVupZJTj4R2kh3QPVK1qF25Louw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        @livewireStyles
        
        <!-- Scripts  -->
        
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <script src="{{asset('front/assets/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('front/assets/js/task.js')}}"></script>
        
        @livewireScripts
    </body>
</html>
