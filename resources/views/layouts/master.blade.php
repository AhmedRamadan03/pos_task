<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    @include('layouts.css')
    @yield('css')
    <style>
        body{
            overflow-x: hidden
        }
    </style>
</head>
<body>
   @include('layouts.navbar')

   <div id="app">

    <main class="">

        <div class="container">
            {{-- @include('layouts.includs.flash_msg') --}}
        </div>
        <div class="row">
            <div class="col-md-2" style="height:570px">
                @guest()
            @else
            @include('layouts.sidebar')
            @endguest
            </div>
            <div class="{{ !auth()->user()?'col-12':'col-md-10' }} p-5">
                @include('layouts.includs.flash_msg')

                 @yield('content')

            </div>
        </div>

    </main>
    </div>

@include('layouts.script')
@yield('js')
</body>
</html>

