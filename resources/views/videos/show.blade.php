@extends( (Auth::user()->is_admin == 1) ? 'layouts.admin_layout.admin_layout' : 'layouts.app')

<!-- identical to user page  -->

@section('content')
<div class="content-wrapper container">
  <div class="row ">

    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show Video</h2>
        </div>

        <div class="pull-right">
          @if (Auth::user()->is_admin == 1)
            <a class="btn btn-primary" href="{{ route('videos.index') }}"> Back</a>
          @else
            <a class="btn btn-primary" href="{{ route('home') }}"> Back</a>
          @endif
        </div>
    </div>
</div>

<div class="col-lg-12 margin-tb">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <!-- <img style="height: 600px" src="{{ asset('storage/vids/' . $video->videoFile) }}" alt=""> -->

            <!-- videojs -->
            <video
              id="my-video"
              class="video-js vjs-default-skin .vjs-big-play-button video"
              controls
              preload="auto"
              width="auto"
              height="50%"
              poster="{{ $video->imageFile }}"
              data-setup="{}"
            >
              <source src="{{asset('storage/vids/' . $video->videoFile)}}" type="video/mp4" />
              <p class="vjs-no-js">
                To view this video please enable JavaScript, and consider upgrading to a
                web browser that
                <a href="https://videojs.com/html5-video-support/" target="_blank"
                  >supports HTML5 video</a
                >
              </p>
            </video>

          </div>

          <div class="col-xs-12 col-sm-12 col-md-12">
            @foreach($video->categories as $category)
            <li>{{ $category->name }}</li>
            @endforeach
          </div>

  <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
              <strong>Name:</strong>
              {{ $video->name }}
          </div>
      </div>

      <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
              <strong>description:</strong>
              {{ $video->description }}
          </div>
      </div>

      <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
              <strong>price:</strong>
              {{ $video->price }}
          </div>
      </div>

      <div class="col-xs-12 col-sm-12 col-md-12">
        <a class="btn btn-info" href="/videos/download/{{$video->videoFile}}">download</a>
      </div>

  </div>

</div>

</div>
@endsection
