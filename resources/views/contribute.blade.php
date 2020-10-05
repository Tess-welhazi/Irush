@extends('layouts.app')

@section('content')

<div class="bg py-5">

  <div class="py-4 text-center" style="color:white">
    <h3>Contribute videos.</h3>

    <br>
    <h3>Get paid.</h3>
    <br>
    <a href="{{asset('apply')}}" class="btn btn-info blue" style="border: none !important">Apply now</a>
    <br>
    <a href="#section2" style="font-size: 2rem">
      <i class="fas fa-angle-down"></i>
    </a>



  </div>

</div>

<div class="container" id="section2">

  <h3>Our Contributors</h3>

  <div class="card-deck" style="margin-bottom: 2rem;">

    <div class="card white col-md-3 cont-card" style="padding:2rem 1rem 2rem 1rem;">
      <h4>Janette Doe</h4>
      <img src="{{asset('/storage/img/lady_profile.jpg')}}" class="contributer-pic">

      <div class="pads widest justify-content-center">
        <button type="button" class="btn-sm btn profile-btn widest" name="button"> <strong>View Profile </strong></button>
      </div>
    </div>

    <div class="card white col-md-3 cont-card" style="padding:2rem 1rem 2rem 1rem;">
      <h4>John Gilbert</h4>
      <img src="{{asset('images/admin_img/user2-160x160.jpg')}}" class="contributer-pic">

      <div class="pads widest justify-content-center">
        <button type="button" class="btn-sm btn profile-btn widest" name="button"> <strong>View Profile </strong></button>
      </div>
    </div>

    <div class="card white col-md-3 cont-card" style="padding:2rem 1rem 2rem 1rem;">
      <h4>Rania Saleh</h4>
      <img src="{{asset('/images/user-woman-2.jpg')}}" class="contributer-pic">

      <div class="pads widest justify-content-center">
        <button type="button" class="btn-sm btn profile-btn widest" name="button"> <strong>View Profile </strong></button>
      </div>
    </div>

    <div class="card white col-md-3 cont-card" style="padding:2rem 1rem 2rem 1rem;">
      <h4>Saleh Saleh</h4>
      <img src="{{asset('/images/user-man-2.jpg')}}" class="contributer-pic">

      <div class="pads widest justify-content-center">
        <button type="button" class="btn-sm btn profile-btn widest" name="button"> <strong>View Profile </strong></button>
      </div>
    </div>

  </div>

  <div class="card-deck" style="margin-bottom: 2rem;">

    <div class="card white col-md-3 cont-card" style="padding:2rem 1rem 2rem 1rem;">
      <h4>Janette Doe</h4>
      <img src="{{asset('/storage/img/lady_profile.jpg')}}" class="contributer-pic">

      <div class="pads widest justify-content-center">
        <button type="button" class="btn-sm btn profile-btn widest" name="button"> <strong>View Profile </strong></button>
      </div>
    </div>

    <div class="card white col-md-3 cont-card" style="padding:2rem 1rem 2rem 1rem;">
      <h4>John Gilbert</h4>
      <img src="{{asset('images/admin_img/user2-160x160.jpg')}}" class="contributer-pic">

      <div class="pads widest justify-content-center">
        <button type="button" class="btn-sm btn profile-btn widest" name="button"> <strong>View Profile </strong></button>
      </div>
    </div>

    <div class="card white col-md-3 cont-card" style="padding:2rem 1rem 2rem 1rem;">
      <h4>Rania Saleh</h4>
      <img src="{{asset('/images/user-woman-2.jpg')}}" class="contributer-pic">

      <div class="pads widest justify-content-center">
        <button type="button" class="btn-sm btn profile-btn widest" name="button"> <strong>View Profile </strong></button>
      </div>
    </div>

    <div class="card white col-md-3 cont-card" style="padding:2rem 1rem 2rem 1rem;">
      <h4>Saleh Saleh</h4>
      <img src="{{asset('/images/user-man-2.jpg')}}" class="contributer-pic">

      <div class="pads widest justify-content-center">
        <button type="button" class="btn-sm btn profile-btn widest" name="button"> <strong>View Profile </strong></button>
      </div>
    </div>

  </div>


</div>

@endsection
