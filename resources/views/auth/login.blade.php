@extends('layouts.app-sans-nav')

@section('content')
<div class="login-wrapper" style="">

    <div class="pic-column">
      <img src="{{asset('/images/photo cover.png')}}" class="side-pic">
    </div>


    <div class="login-column">

      <div class="row big-logo col-md-10 offset-md-1  offset-md-1">
        <a href="{{ route('home')}}">
          <img src="{{asset('images/IRUSH-black-logo.png')}}" style="height: 35px;">
        </a>
      </div>


                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">

                            <div class="col-md-10  offset-md-1">
                                <input id="email" placeholder="{{ __('Email') }}" type="email" class="form-inputs form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-10  offset-md-1">
                                <input id="password" placeholder="{{ __('Password') }}" type="password" class="form-inputs form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-10  offset-md-1">
                                <div class="form-check">
                                    <input class="form-check-input form-inputs" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label " style="color: #7C9CBF" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0 ">
                            <div class="col-md-10  offset-md-1 ">
                                <button type="submit" class="btn btn-primary btn-info blue">
                                    {{ __('Login') }}
                                </button>


                                @if (Route::has('password.request'))
                                    <a class="btn btn-link Forgot-password col-md-10 offset-md-1" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif

                                <br><br><br>
                            </div>
                        </div>
                    </form>

                    <div class="form-group row mb-0">
                      <div class="col-md-10  offset-md-1">
                        <button type="button" name="redirect" class="btn profile-btn widest">
                          <a href="{{ route('register') }}" class="dark-blue-text">
                            Not a member ? Get started now
                          </a>
                        </button>
                      </div>
                    </div>

    </div>



</div>
@endsection
