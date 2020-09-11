<div class="" >

<div class="sorting">
<br>
  <div class="form-group" style="width: 20%;">
    <select class="form-control">
      <option>Popular</option>
      <option>New</option>
      <option>Oldest</option>
    </select>
  </div>

</div>

  <br>
  @foreach($videos->chunk(3) as $chunk)
      <div class="card-deck row-fluid">
          @foreach($chunk as $video)

          <div class="card col-md-4" style="width: 20rem;">
            <picture>
              <a href="#" class="icon" title="Play circle">
                <i class="fa fa-play-circle"></i>
              </a>
             <!-- <source media="" srcset="{{$video->imageFile}}"> -->
             <!-- <source media="(min-width: 465px)" srcset="img_white_flower.jpg"> -->
             <!-- <img src="{{asset('storage/img/' . $video->imageFile)}}" width="320" height="240"> -->
            </picture>

            <h4>{{ $video->name }}</h4>
            <a class="btn btn-info" href="{{ route('videos.show',$video->id) }}">Show</a>

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

                             @if (Auth::check())
                                      <favorite
                                          :video={{ $video->id }}
                                          :favorited={{ $video->favorited() ? 'true' : 'false' }}
                                      ></favorite>
                              @endif

                         </div>
             </form>

             @if (Auth::check())
             <favorite
                 :video={{ $video->id }}
                 :favorited={{ $video->favorited() ? 'true' : 'false' }}
             ></favorite>

              <cart
                 :video={{ $video->id }}
                 :carted={{ $video->carted() ? 'true' : 'false' }}>

              </cart>
             @endif

          </div>

          @endforeach
      </div>

      @endforeach

      <div class="pagination">
        {{ $videos->links() }}
      </div>

</div>
