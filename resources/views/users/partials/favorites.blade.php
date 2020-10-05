<div class="container" >

  <br>
  @foreach($myFavorites->chunk(3) as $chunk)
      <div class="card-deck row-fluid">
          @foreach($chunk as $myFavorite)

          <div class="card2 col-md-4">

            <!-- <img src="{{asset('images/example.svg')}}" style=""> -->

            <img src="{{asset('storage/img/'. $myFavorite->imageFile)}}" style="">
            <div class="" style="display: flex;
                                  flex-direction: column;
                                  width: 100%;">

              <div class="play-button">
                <a href="{{ route('videos.show',$myFavorite->id) }}" class="icon" title="Play circle">
                  <i class="fa fa-play-circle"></i>
                </a>
              </div>

              <div class="info">

                <a class="title" href="{{ route('videos.show',$myFavorite->id) }}">
                  <h4>{{ $myFavorite->name }}</h4>
                </a>

                    <form action="{{ route('cart.store') }}" method="POST">
                         {{ csrf_field() }}
                             <input type="hidden" value="{{ $myFavorite->id }}" id="id" name="id">
                             <input type="hidden" value="{{ $myFavorite->name }}" id="name" name="name">
                             <input type="hidden" value="{{ $myFavorite->price }}" id="price" name="price">
                             <input type="hidden" value="{{ $myFavorite->imageFile }}" id="img" name="img">
                             @foreach($myFavorite->categories as $category)
                                 <input type="hidden" value="{{ $category->name }}" id="category" name="img">
                             @endforeach
                             <input type="hidden" value="1" id="quantity" name="quantity">


                                     @if (Auth::check())
                                              <favorite
                                                  :video={{ $myFavorite->id }}
                                                  :favorited={{ $myFavorite->favorited() ? 'true' : 'false' }}
                                              ></favorite>

                                              <cart
                                                 :video={{ $myFavorite->id }}
                                                 :carted={{ $myFavorite->carted() ? 'true' : 'false' }}>
                                              </cart>
                                      @endif

                     </form>
              </div>

            </div>

          </div>

          @endforeach
      </div>

      @endforeach


</div>
