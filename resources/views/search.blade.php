@extends ('layouts.app')

@section('content')

<div class="container">

    <div class="card" style="margin-top: 3%;">

        <h3 class="card-title">Advanced search</h3>
        <div class="card-body">
          <form action="{{Route('filter')}}" method="POST" role="search" class=" input-group md-form form-sm form-2 pl-0">
              {{ csrf_field() }}
              <div class="input-group">
                  <input type="text" value="" class="form-control my-0 py-1 lime-border searcher" name="q" aria-label="Search" placeholder="{{ $query }}">

              </div>

                <div class="input-group">
                  <div class="col-3">
                    <label>From</label>
                    <input type="number" class="form-control" id="min_price" name="min_price" placeholder="{{ $min ?? '' }}">
                  </div>
                  <div class="col-3">
                    <label>To</label>
                    <input type="number" class="form-control" id="max_price" name="max_price" placeholder="{{$max ?? ''}}">
                  </div>

                </div>

                <div class="col-sm-12">
                  <label>Category</label>
                  <br>
                  <!-- checkbox -->
                  <div class="form-group">
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input" type="radio" name="categories" value="food" id="1">
                      <label class="custom-control-label" for="1">food</label>
                      <br>
                    </div>

                    <div class="custom-control custom-radio">
                      <input class="custom-control-input" type="radio" name="categories" value="animals" id="2">
                      <label class="custom-control-label" for="2">animals</label>
                      <br>
                    </div>

                    <div class="custom-control custom-radio">
                      <input class="custom-control-input" type="radio" name="categories" value="people" id="3">
                      <label class="custom-control-label" for="3">people</label>
                      <br>
                    </div>

                    <div class="custom-control custom-radio">
                      <input class="custom-control-input" type="radio" name="categories" value="urban" id="4">
                      <label class="custom-control-label" for="4">urban</label>
                      <br>
                    </div>


                  </div>
                  <!-- checkbox ends -->
                </div>

                <br>

              <div class="col-sm-12">

                <!-- radio -->
                <div class="form-group">
                  <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="cc-by" name="licence" value="cc-by">
                    <label for="cc-by" class="custom-control-label">CC-BY</label>
                  </div>
                  <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="cc-0" name="licence" value="cc-0">
                    <label for="cc-0" class="custom-control-label">CC-0</label>
                  </div>

                  <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="any" name="licence" checked value="any">
                    <label for="any" class="custom-control-label">Any</label>
                  </div>

                </div>
              </div>
              <button type="submit" name="button" class="btn btn-primary" >search</button>
          </form>
      </div>
    </div>

    <!-- regular result -->
    @if(isset($details))
        <p style="color: black">{{$details->count()}} search result(s) for "<b> {{ $query }} </b>"</p>

        @foreach($details->chunk(3) as $chunk)

        <div class="card-deck row-fluid">
            @foreach($chunk as $video)

                <div class="card col-md-4" style="width: 20rem;">
                  <picture>
                    <a href="#" class="icon" title="Play circle">
                      <i class="fa fa-play-circle"></i>
                    </a>
                   <source media="" srcset="{{$video->imageFile}}">
                   <!-- <source media="(min-width: 465px)" srcset="img_white_flower.jpg"> -->
                   <img src="{{asset('storage/img/' . $video->imageFile)}}" width="320" height="240">
                  </picture>

                  <h4>{{ $video->name }}</h4>
                  <a class="btn btn-info" href="{{ route('videos.show',$video->id) }}">Show</a>
                  <!-- cart -->
                  <form action="{{ route('cart.store') }}" method="POST">
                       {{ csrf_field() }}
                           <input type="hidden" value="{{ $video->id }}" id="id" name="id">
                           <input type="hidden" value="{{ $video->name }}" id="name" name="name">
                           <input type="hidden" value="{{ $video->price }}" id="price" name="price">
                           <input type="hidden" value="{{ $video->imageFile }}" id="img" name="img">
                           @foreach($video->categories as $category)
                               <input type="hidden" value="{{ $category->name }}" id="category" name="img">
                           @endforeach
                           <input type="hidden" value="1" id="quantity" name="quantity">
                               <div class="card-footer" style="background-color: white;">
                                   <div class="row">
                                       <button class="btn btn-secondary btn-sm" class="tooltip-test" title="add to cart">
                                       <i class="fa fa-shopping-cart"></i> add to cart
                                       </button>
                                   </div>
                               </div>
                   </form>
                </div>



            @endforeach
        </div>

@endforeach
        <div class="pagination">
          {{ $details->links() }}
        </div>
    @endif

    @if(isset($message))
    <p id="msg">{{$message}}</p>
    @endif
</div>


@endsection
