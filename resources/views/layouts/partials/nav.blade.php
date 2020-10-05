<nav class="main-header navbar navbar-expand-md navbar-dark irush-color bg-dark shadow-sm">
    <div class="container">
        <!-- <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Irush') }}
        </a> -->

        <a href="{{ route('home') }}">
          <img src="{{asset('images/IRUSH-logo.png')}}" >
        </a>


        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

              <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Explore</a></li>

              <li class="nav-item"><a class="nav-link" href="#">About us</a></li>

              <li class="nav-item"><a class="nav-link" href="{{ route('contribute') }}">Contribute</a></li>

            </ul>


            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item" id="login">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item" id="logout">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('user_profile',auth()->user()) }}">My Profile</a>
                            <a class="dropdown-item" href="{{ route('users.purchases',auth()->user()) }}">My purchases</a>
                            <!-- correct this route later plz -->
                            <!-- <a class="dropdown-item" href="{{ url('my_favorites') }}">My Favorites</a> -->

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                            @if (Auth::user()->is_admin == 1)
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="{{ route('admin.home')}}">Admin Dashboard</a>
                              <a class="dropdown-item" href="{{ route('admin.video')}}">Upload Video</a>
                            @endif
                        </div>
                    </li>

                @endguest

<!-- cart here _____________________________________ -->

                <li class="nav-item dropdown" id="cartish2">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Cart

                        <span class="badge badge-pill badge-dark">
                            <i class="fa fa-shopping-cart"></i> {{ \Cart::getTotalQuantity()}}
                        </span>
                    </a>
<!-- change width here -->
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="width: 250px;">


                        @include('layouts.partials.cart-drop')


                    </div>

                </li>


  <!-- _____________________________________________ -->
            </ul>


        </div>


    </div>
</nav>
