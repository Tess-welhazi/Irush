@extends('layouts.app')

@section('content')
<div class="py-5">

  <div class="py-4 text-center" style="color:white">
    <a href="#">
      <img src="{{asset('images/IRUSH-black-logo.png')}}" alt="">
    </a>

    <br>
    <a href="#section2" style="font-size: 2rem">
      <i class="fas fa-angle-down"></i>
    </a>
  </div>

  <div class="d-flex flex-column justify-content-center align-items-center text-center" id="section2">

    <p style="color: black; font-family: IBM Plex Sans;
        font-style: normal;
        font-weight: 300;">
      we believe in paying the talented creators behind them. IRUSH videos and contributors are carefully curated and are paid for their submissions.
      <br>
      If you're interested in joining Coverr, shooting videos and getting paid, please apply and make sure you provide us with all required information.
    </p>

    <br> <br>
    <form class="col-md-8 text-left" action="index.html" method="post">
      <div class="form-group row">

          <div class="col-md-10 offset-md-1">
              <input id="name" type="text" placeholder="{{ __('Full name') }}" class="form-inputs form-control" name="name"  required >
          </div>


      </div>

      <div class="form-group row" style="">

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
            <label for="based">Where are you based?</label>
              <input id="based" type="text" placeholder="{{ __('location') }}" class="form-inputs form-control" name="based" required>
          </div>
      </div>

      <div class="form-group row">
        <div class="col-md-10 offset-md-1">
          <label for="vimeo">Please share a link to your vimeo account</label>
          <input id="vimeo" type="text" name="" value="" class="form-inputs form-control" required>
        </div>
      </div>

      <div class="form-group row">
        <div class="col-md-10 offset-md-1">
          <label for="vimeo">Please share a link to your instagram account</label>
          <input id="vimeo" type="text" name="" value="" class="form-inputs form-control" required>
        </div>
      </div>

      <div class="form-group row">
        <div class="col-md-10 offset-md-1">
          <label for="vimeo">Do you access to unique locations?</label>
          <input id="vimeo" type="text" name="" value="" class="form-inputs form-control" required>
        </div>
      </div>

      <div class="form-group row">
        <div class="col-md-10 offset-md-1">
          <label for="vimeo">How much would you charge for 50 Stock videos that you edit out unused existing footage of yours?</label>
          <input id="vimeo" type="text" name="" value="" class="form-inputs form-control" required>
        </div>
      </div>

      <div class="form-group row">
        <div class="col-md-10 offset-md-1">
          <label for="vimeo">How much would you charge for 50 Stock videos that involve 2-3 actors?</label>
          <input id="vimeo" type="text" name="" value="" class="form-inputs form-control" required>
        </div>
      </div>

      <div class="form-group row d-flex justify-content-center">
        <button type="submit" name="button" class="btn btn-info blue col-md-5">Apply</button>
      </div>

    </form>


  </div>

</div>
@endsection
