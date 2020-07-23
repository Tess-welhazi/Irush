<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.partials.head')

</head>
<body>
    <div id="app">
      @include('layouts.partials.nav')

        <!-- <main class="py-4">   </main> -->

            @yield('content')

    </div>
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>
