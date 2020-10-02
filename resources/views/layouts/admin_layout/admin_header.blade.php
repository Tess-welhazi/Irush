<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
  <!-- Left navbar links -->
  <ul class="navbar-nav nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a class="navbar-brand" href="{{ url('/') }}">
          {{ config('app.name', 'Irush') }}
      </a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link">Contact</a>
    </li>

  </ul>

  <!-- SEARCH FORM -->
  <form class="form-inline ml-3">
    <div class="input-group input-group-sm">
      <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-navbar" type="submit">
          <i class="fas fa-search"></i>
        </button>
      </div>
    </div>
  </form>

  <!-- Right navbar links -->

  <li class="nav-item dropdown nav">
      <a id="navbarDropdown" style="color: white;" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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

      <li class="nav-item dropdown" id="cartish2">
          <a id="navbarDropdown" style="color: white;" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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

  </li>
</nav>
<!-- /.navbar -->
