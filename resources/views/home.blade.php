@extends('layouts.app')

@section('content')
<div class="bg py-5">
  @include('layouts.partials.searchbar')
  <div class="py-4 text-left" style="color:white">Suggested: Urban, Food, People, Animals, Nature</div>
  <p>explore</p>
  <br>

  <a href="#section2" style="font-size: 2rem">
    <i class="fas fa-angle-down"></i>
  </a>
</div>

<div class="container" id="section2">
  <div class="row video-section">
    <h4 style="font-weight: 900; font-size: 24px">Featured videos</h4>

    <div class="sorting-dropdown">
      <br>
        <div class="form-group " >

          <select class="form-control dropdown-content" name="sorting" id="sorting">
            <option selected value="Recently added">Recently added</option>
            <option value="Popular">Popular</option>
            <option value="Oldest">Oldest</option>
          </select>
        </div>
    </div>
  </div>


    @include('layouts.partials.videoList')

</div>
@endsection
