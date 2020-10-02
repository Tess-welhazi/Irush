<div class="container" >

  <br>
  @foreach($myFavorites->chunk(3) as $chunk)
      <div class="card-deck row-fluid">
          @foreach($chunk as $myFavorite)

          <div class="card col-md-4" style="width: 20rem;">


            <picture style="display: flex; align-self: center" >
              <a href="#" class="icon" title="Play circle">
                <i class="fa fa-play-circle"></i>
              </a>
          
             <!-- <img src="{{asset('storage/img/' . $myFavorite->imageFile)}}" width="350" height="250"> -->

             <img src="{{asset('images/example.svg')}}" style="object-fit: cover; width:300px; height:200px">

            </picture>

            <h4>{{ $myFavorite->name }}</h4>
            <a class="btn btn-info" href="{{ route('videos.show',$myFavorite->id) }}">Show</a>

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
                         <div class="card-footer" style="background-color: white;">
                             <div class="row">
                                 <button class="btn btn-secondary btn-sm" class="tooltip-test" title="add to cart">
                                 <i class="fa fa-shopping-cart"></i> add to cart
                                 </button>
                             </div>

                             @if (Auth::check())
                                      <favorite
                                          :video={{ $myFavorite->id }}
                                          :favorited={{ $myFavorite->favorited() ? 'true' : 'false' }}
                                      ></favorite>
                              @endif

                         </div>
             </form>

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

          </div>

          @endforeach
      </div>

      @endforeach


</div>
