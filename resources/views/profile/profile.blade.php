@extends ('layouts.app')

@section('content')

<div class="profile_head col-lg-12 text-center">
  <br>
  <div name="circular" style="" class="rounded-circle img-thumbnail rounded mx-auto d-block img-responsive">

  </div>
  <br>
  <h2>{{ Auth::user()->name }}</h2>
  <p>Since - 11 Jun 2019</p>

  <button type="button" name="button" class="btn btn-primary">Edit profile</button>
  <button type="button" name="button" class="btn btn-primary">Follow</button>
</div>

<div  name="tabs">
  <ul class="nav nav-tabs text-center blurry d-flex justify-content-center align-items-center">
    <li class="active pads"><a href="#">Videos</a></li>
    <li class="pads"><a href="#">Collections</a></li>
  </ul>
</div>

<div class="container ">
  <br>
@include('layouts.partials.videoList')


</div>

@endsection
