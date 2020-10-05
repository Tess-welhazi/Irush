<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.partials.head')


    <script src="{{asset('js/app.js')}}"></script>

</head>
<body>
    <div id="app">
      @include('layouts.partials.nav')

        <!-- <main class="py-4">   </main> -->

            @yield('content')

    </div>
      @yield('script')
</body>

    @include('layouts.partials.footer')

</html>
