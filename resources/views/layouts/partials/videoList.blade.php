<div class="">
  <br>
@foreach($videos->chunk(3) as $chunk)
    <div class="card-deck row-fluid">

      @foreach($chunk as $video)
          <div class="card col-md-4" style="width: 20rem;">
            <!-- this is the play button -->
            <div class="overlay">
              <a href="#" class="icon" title="Play circle">
                <i class="fa fa-play-circle"></i>
              </a>
            </div>

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
          </div>

        @endforeach

    </div>
@endforeach
</div>
