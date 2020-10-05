<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.partials.head')

    <script src="{{asset('js/app.js')}}"></script>

</head>
<body>
    <div id="app">
      
        <!-- <main class="py-4">   </main> -->

            @yield('content')

    </div>

</body>
</html>
