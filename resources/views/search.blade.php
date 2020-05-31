@extends ('layouts.app')

@section('content')

<div class="container">

    <div class="card" style="margin-top: 3%;">

        <h3 class="card-title">Advanced search</h3>
        <div class="card-body">
          <form action="/search" method="POST" role="search" class="searcher input-group md-form form-sm form-2 pl-0">
              {{ csrf_field() }}
              <div class="input-group">
                  <input type="text" class="form-control my-0 py-1 lime-border" name="q" aria-label="Search" placeholder="Search users">
                   <span class="input-group-btn lime lighten-2">
                      <button type="submit" class="btn btn-default">
                          <span class="fas fa-search text-grey"></span>
                      </button>
                  </span>
              </div>

                <div class="input-group">
                  <div class="col-3">
                    <label>From</label>
                    <input type="number" class="form-control" id="min_price" name="min_price">
                  </div>
                  <div class="col-3">
                    <label>To</label>
                    <input type="number" class="form-control">
                  </div>

                </div>

                <div class="col-sm-6">
                  <label>Category</label>
                  <br>
                  <!-- checkbox -->
                  <div class="form-group" style="display: flex;flex-direction: row;">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox">
                        <label class="form-check-label">Animals</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox">
                        <label class="form-check-label">Urban</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox">
                        <label class="form-check-label">People</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox">
                        <label class="form-check-label">Food</label>
                      </div>
                  </div>
                  <!-- checkbox ends -->
                </div>


                <div class="row" style="margin-left: 0.5%;">
                  <div class="col-sm-6">
                  <label>Licence</label>
                  <br>
                  <!-- checkbox -->
                  <div class="form-group" style="display: flex;flex-direction: row;">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox">
                        <label class="form-check-label">CC-0</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox">
                        <label class="form-check-label">CC-BY</label>
                      </div>

                  </div>
                  <!-- checkbox ends -->
                </div>
              </div>
              <div class="col-sm-6">

                <!-- radio -->
                <div class="form-group">
                  <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="customRadio1" name="customRadio">
                    <label for="customRadio1" class="custom-control-label">Custom Radio</label>
                  </div>
                  <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="customRadio2" name="customRadio" checked>
                    <label for="customRadio2" class="custom-control-label">Custom Radio </label>
                  </div>
                
                </div>
              </div>
              <button type="button" name="button" class="btn btn-primary" >search</button>
          </form>
      </div>
    </div>

    <!-- regular result -->

    @if(isset($details))
        <p> The Search results for your query <b> {{ $query }} </b> are :</p>
    <h2>Sample User details</h2>
    <table class="table table-striped">

        <tbody>
            @foreach($details as $video)
            <!-- <tr>
                <td>{{$video->name}}</td>
                <td>{{$video->description}}</td>
            </tr> -->

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
            </div>


            @endforeach
        </tbody>
    </table>
    @endif

    @if(isset($message))
    <p>{{$message}}</p>
    @endif
</div>


@endsection
