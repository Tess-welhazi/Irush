<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <title>test</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="{{ asset('/css/range-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/profile.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/cart.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/search.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans" rel="stylesheet">
    <link rel="stylesheet" href="{{url('plugins/fontawesome-free/css/all.min.css')}}">

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script type="text/javascript">
      $('input').popup();
      </script>
      <!-- test -->
      <link href="{{ asset('/css/jquery.mobile-1.4.5.css') }}" rel="stylesheet">
      <script src="https://demos.jquerymobile.com/1.4.2/js/jquery.js"></script>

      <script src="https://demos.jquerymobile.com/1.4.2/js/jquery.mobile-1.4.2.min.js"></script>
  </head>
  <body>
    @include('layouts.partials.nav')

    <div id="app">
      <div class="range-slider">
        <form>
          <div data-role="rangeslider">
              <label for="range-1a">Rangeslider:</label>
              <input type="range" name="range-1a" id="range-1a" min="0" max="100" value="40" data-popup-enabled="true" data-show-value="true">
              <label for="range-1b">Rangeslider:</label>
              <input type="range" name="range-1b" id="range-1b" min="0" max="100" value="80" data-popup-enabled="true" data-show-value="true">
          </div>
        </form>

      </div>
    </div>

    <div class="col-lg-5 flex-row align-items-center justify-content-space-between cart-side">

        <div class="card col-lg-6 d-flex flex-row " style="border: none">
                <p style="color: black"> <b>Total: </b> </p>
                <p style="color: black">${{ \Cart::getTotal() }}</p>

        </div>

        <a href="/" class="btn btn-info blue col-lg-6">Continue Shopping</a>

        <form action="{{ route('cart.checkout') }}" method="POST">
          {{ csrf_field() }}
          <button  class="btn  green col-lg-6">Proceed To Checkout</button>
        </form>
    </div>



  </body>
</html>
