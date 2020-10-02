@extends( (Auth::guest() or Auth::user()->is_admin == 0) ? 'layouts.app' : 'layouts.admin_layout.admin_layout')

<!-- identical to user page  -->

@section('content')
<div class="video-page">
  <h3>{{ $video->name }}</h3>
  <div class="video-wrapper">
    <video
      id="my-video"
      class="video-js vjs-default-skin .vjs-big-play-button video"
      controls
      preload="auto"
      width="auto"
      height="400rem"
      poster="{{ asset('storage/img/' . $video->imageFile)  }}"
      data-setup="{}"
      style="flex: 2"
    >
      <source src="{{asset('storage/vids/' . $video->videoFile)}}" type="video/mp4" />
        <p>$video->videoFile</p>
      <p class="vjs-no-js">
        To view this video please enable JavaScript, and consider upgrading to a
        web browser that
        <a href="https://videojs.com/html5-video-support/" target="_blank"
          >supports HTML5 video</a
        >
      </p>
    </video>

    <div class="video-details">
      <p style="color: black">
        <strong>Price:</strong>


          <strong style="font-size: 24px">
                {{ $video->price }}$
          </strong>
      </p>

      <p>
        <strong>description: </strong>
        <br>
        {{ $video->description }}
      </p>

      <div class="row profile-segment">
            <div style="flex-direction: row; display: flex; justify-content: space-between;
            align-items: center;">
              <img src="{{asset('images/admin_img/user2-160x160.jpg')}}" class="profile-circle" style="object-fit: cover">
              <h6> <strong>John Doe</strong></h6>
            </div>


            <button type="button" class="btn-sm btn profile-btn" name="button"> <strong>View Profile </strong></button>

      </div>

      <br>
      <div class="row">
        <a class="btn btn-info blue" href="{{  URL::signedRoute(
          'download', ['id'=>$video->id ]
        ) }}"> Download
        </a>
      </div>

      <br>
      <br>
      <div class="row">
        <form action="{{ route('cart.store') }}" method="POST" style="flex: 1;">
             {{ csrf_field() }}
                 <input type="hidden" value="{{ $video->id }}" id="id" name="id">
                 <input type="hidden" value="{{ $video->name }}" id="name" name="name">
                 <input type="hidden" value="{{ $video->price }}" id="price" name="price">
                 <input type="hidden" value="{{ $video->imageFile }}" id="img" name="img">
                 @foreach($video->categories as $category)
                     <input type="hidden" value="{{ $category->name }}" id="category" name="img">
                 @endforeach
                 <input type="hidden" value="1" id="quantity" name="quantity">

                             <button class="btn green" class="tooltip-test" title="add to cart">
                             <i class="fa fa-shopping-cart"></i> add to cart
                             </button>

         </form>
      </div>

    </div>
  </div>



</div>
@endsection
