<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    @include('layouts.partials.style')
    @include('layouts.partials.js')
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    {{-- Wrapper --}}
    <div class="wrapper">

        {{-- Preloader --}}
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="{{ asset('dist/dist/img/Tilkam.png') }}" alt="SMKN 1 TilKam" height="150"
                width="150">
        </div>
        {{-- end Preloader --}}

        {{-- Navbar --}}
        @include('layouts.partials.navbar')
        {{-- end Navbar --}}

        {{-- Sidebar --}}
        @include('layouts.partials.sidebar')
        {{-- end Sidebar --}}

        {{-- Main Content --}}
        @yield('container')
        {{-- end Main Content --}}

        {{-- Footer --}}
        @include('layouts.partials.footer')
        {{-- end Footer --}}
    </div>
    {{-- end Wrapper --}}

    @include('layouts.partials.jsfooter')
</body>

</html>
