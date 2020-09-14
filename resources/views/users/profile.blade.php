@extends ('layouts.app')

@section('content')

<div class="profile_head col-lg-12 text-center">
  <br>
  <div name="circular" style="" class="rounded-circle img-thumbnail rounded mx-auto d-block img-responsive">

  </div>
  <br>
  <h2>{{$user->name}}</h2>
  <p>Since {{$user->created_at->format('m/Y')}}</p>

@auth
    @if (Auth::user()->id == $user->id)
      <button type="button" name="button" class="btn btn-primary">Edit profile</button>
    @endif
@endauth

@guest
  <button type="button" name="button" class="btn btn-primary">Follow</button>
@endguest
</div>

<!-- <div  name="tabs">
  <ul class="nav nav-tabs text-center blurry d-flex justify-content-center align-items-center">
    <li class="active pads"><a href="#">Videos</a></li>
    <li class="pads"><a href="#">Collections</a></li>
  </ul>
</div> -->

<tabs name="tabs">
   <tab name="Videos" :selected="true" class="nav-item">
     @include('users.partials.user_content')
   </tab>
   <tab name="Collections" :selected="false" class="nav-item">
     @include('users.partials.favorites')
   </tab>

<tabs>


<div class="container ">
  <br>



</div>

@endsection
