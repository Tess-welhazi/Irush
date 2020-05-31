@extends('layouts.app')

@section('content')
<div class="bg py-5">
  <div class="py-4 text-center">Welcome to Irush</div>
  @include('layouts.partials.searchbar')
</div>
<div class="container">
    <div class="categories_btn row justify-content-center" name="categories_btn">
      <button type="button" name="button" class="categories_btn btn btn-primary">Urban</button>
      <button type="button" name="button" class="categories_btn btn btn-primary">Animals</button>
      <button type="button" name="button" class="categories_btn btn btn-primary">Food</button>
      <button type="button" name="button" class="categories_btn btn btn-primary">People</button>
      <button type="button" name="button" class="categories_btn btn btn-primary">Nature</button>
    </div>

    @include('layouts.partials.videoList')

</div>
@endsection
