@extends('layouts.app-sans-nav')

@section('content')
<div class=" login-wrapper">

  <div class="pic-column">
    <img src="{{asset('/images/photo cover.png')}}" class="side-pic">
  </div>

  <div class="login-column">

        <div class="row big-logo col-md-10 offset-md-1  offset-md-1">
          <a href="{{ route('home')}}">
            <img src="{{asset('images/IRUSH-black-logo.png')}}" style="height: 35px;">
          </a>
        </div>

        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">

                                <div class="col-md-10 offset-md-1">
                                    <input id="name" type="text" placeholder="{{ __('Name') }}" class="form-inputs form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-md-10 offset-md-1">
                                    <input id="email" type="email" placeholder="{{ __('E-Mail Address') }}" class="form-inputs form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-md-10 offset-md-1">
                                    <input id="password" placeholder="{{ __('Password') }}" type="password" class=" form-inputs form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-md-10 offset-md-1">
                                    <input id="password-confirm" placeholder="{{ __('Confirm Password') }}" type="password" class="form-inputs form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-10 offset-md-1 offset-md-1">
                                    <button type="submit" class="btn btn-primary btn-info blue">
                                        {{ __('Signup') }}
                                    </button>
                                </div>
                            </div>
                        </form>

                        <br><br><br>
        <div class="form-group row mb-0">
            <div class="col-md-10 offset-md-1 offset-md-1">
                  <button type="button" name="redirect" class="btn profile-btn widest" style="margin-top: 3rem;">
                        <a href="{{ route('login') }}" class="dark-blue-text">
                            Already a member ? Login
                        </a>
                  </button>
            </div>
        </div>

  </div>




</div>
@endsection
