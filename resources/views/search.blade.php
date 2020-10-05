@extends ('layouts.app')

@section('content')

<div class="search-wrapper">

    <div class="side-filter col-md-6" style="">

      <h3 class="h3-search">Filter</h3>

      <form class="md-form " action="{{Route('filter')}}" method="POST">
        {{ csrf_field() }}
        <div class="input-group">
            <input type="text" value="" class="form-control my-0 py-1 lime-border searcher" name="q" aria-label="Search" placeholder="{{ $query }}">
        </div>

        <div id="price">
          <h5 class="label">Price range</h5>
          <div data-role="rangeslider">
              <label for="range-1a">Rangeslider:</label>
              <input type="range" name="range-1a" id="range-1a" min="0" max="100" value="40" data-popup-enabled="true" data-show-value="true">
              <label for="range-1b">Rangeslider:</label>
              <input type="range" name="range-1b" id="range-1b" min="0" max="100" value="80" data-popup-enabled="true" data-show-value="true">
          </div>
        </div>
        <!-- categories row -->
        <div id="category">

          <h5 class="label">Category</h5>
          <div class="custom-control custom-radio">
            <input class="custom-control-input" type="radio" name="categories" value="food" id="1">
            <label class="custom-control-label" for="1"><b>food</b></label>
            <br>
          </div>

          <div class="custom-control custom-radio">
            <input class="custom-control-input" type="radio" name="categories" value="animals" id="2">
            <label class="custom-control-label" for="2"><b>animals</b></label>
            <br>
          </div>

          <div class="custom-control custom-radio">
            <input class="custom-control-input" type="radio" name="categories" value="people" id="3">
            <label class="custom-control-label" for="3"><b>people</b></label>
            <br>
          </div>

          <div class="custom-control custom-radio">
            <input class="custom-control-input" type="radio" name="categories" value="urban" id="4">
            <label class="custom-control-label" for="4"><b>urban</b></label>
            <br>
          </div>

        </div>

        <div id="licence">
            <h5 class="label">Licence</h5>

            <div class="custom-control custom-radio">
              <input class="custom-control-input" type="radio" name="licenses" value="CC BY-ND" id="5">
              <label class="custom-control-label" for="5">CC BY-ND</label>
              <br>
            </div>

            <div class="custom-control custom-radio">
              <input class="custom-control-input" type="radio" name="licenses" value="CC BY" id="6">
              <label class="custom-control-label" for="6">CC BY</label>
              <br>
            </div>

            <div class="custom-control custom-radio">
              <input class="custom-control-input" type="radio" name="licenses" value="CC BY-NC" id="7">
              <label class="custom-control-label" for="7">CC BY-NC</label>
              <br>
            </div>

            <div class="custom-control custom-radio">
              <input class="custom-control-input" type="radio" name="licenses" value="CC BY-NC-SA" id="8">
              <label class="custom-control-label" for="8">CC BY-NC-SA</label>
              <br>
            </div>

            <div class="custom-control custom-radio">
              <input class="custom-control-input" type="radio" name="licenses" value="CC BY-NC-SA" id="8">
              <label class="custom-control-label" for="8">Any</label>
              <br>
            </div>

        </div>

        <button type="submit" name="button" class="btn green"> Update </button>
      </form>


    </div>

    <!-- regular result -->
    <div class="search-results">


      @if(isset($details))
          <h3 style="color: black">{{$details->count()}} search result(s) for "<b> {{ $query }} </b>"</h3>

          @foreach($details->chunk(3) as $chunk)

          <div class="card-deck row-fluid">
              @foreach($chunk as $video)

                              <div class="card2 col-md-4" style="width: 20rem;">

                                <!-- <img src="{{asset('images/example.svg')}}" style=""> -->

                                <img src="{{asset('storage/img/'. $video->imageFile)}}" style="">
                                <div class="" style="display: flex;
                                                      flex-direction: column;
                                                      width: 100%;">

                                  <div class="play-button">
                                    <a href="{{ route('videos.show',$video->id) }}" class="icon" title="Play circle">
                                      <i class="fa fa-play-circle"></i>
                                    </a>
                                  </div>

                                  <div class="info">

                                    <a class="title" href="{{ route('videos.show',$video->id) }}">
                                      <h4>{{ $video->name }}</h4>
                                    </a>

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


                                                         @if (Auth::check())
                                                                  <favorite
                                                                      :video={{ $video->id }}
                                                                      :favorited={{ $video->favorited() ? 'true' : 'false' }}
                                                                  ></favorite>
                                                          @endif
                                                                  <cart
                                                                     :video={{ $video->id }}
                                                                     :carted={{ $video->carted() ? 'true' : 'false' }}>
                                                                  </cart>


                                         </form>
                                  </div>

                                </div>

                              </div>




              @endforeach
          </div>

          @endforeach
          <div class="pagination">
            {{ $details->links() }}
          </div>
      @endif

      @if(isset($message))
      <p id="msg" style="color: black; margin-top: 2rem;">{{$message}}</p>
      @endif

    </div>

</div>


@endsection

@section('script')

@endsection
