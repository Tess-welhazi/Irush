@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style="padding-top: 3rem; padding-bottom: 2rem">
        <div class="col-md-10 col-md-offset-2">
            <div class="col-lg-4 col-md-offset-2" style="margin-bottom: 1rem">
                <h3>My Purchases</h3>
            </div>
            @forelse ($myPurchases as $myPurchase)


<!-- new card -->

        <div class="purchase-container d-flex white">

            <!-- video card -->
                  <div class="card2 col-md-5">

                    <!-- <img src="{{asset('images/example.svg')}}" style=""> -->

                    <img src="{{asset('storage/img/'. $myPurchase->imageFile)}}" style="">
                    <div class="" style="display: flex;
                                          flex-direction: column;
                                          width: 100%;">

                      <div class="play-button">
                        <a href="{{ route('videos.show',$myPurchase->id) }}" class="icon" title="Play circle">
                          <i class="fa fa-play-circle"></i>
                        </a>
                      </div>

                      <div class="info">

                        <a class="title" href="{{ route('videos.show',$myPurchase->id) }}">
                          <h4>{{ $myPurchase->name }}</h4>
                        </a>

                            <form action="{{ route('cart.store') }}" method="POST">
                                 {{ csrf_field() }}
                                     <input type="hidden" value="{{ $myPurchase->id }}" id="id" name="id">
                                     <input type="hidden" value="{{ $myPurchase->name }}" id="name" name="name">
                                     <input type="hidden" value="{{ $myPurchase->price }}" id="price" name="price">
                                     <input type="hidden" value="{{ $myPurchase->imageFile }}" id="img" name="img">
                                     @foreach($myPurchase->categories as $category)
                                         <input type="hidden" value="{{ $category->name }}" id="category" name="img">
                                     @endforeach
                                     <input type="hidden" value="1" id="quantity" name="quantity">


                                             @if (Auth::check())
                                                      <favorite
                                                          :video={{ $myPurchase->id }}
                                                          :favorited={{ $myPurchase->favorited() ? 'true' : 'false' }}
                                                      ></favorite>
                                              @endif
                                                      <cart
                                                         :video={{ $myPurchase->id }}
                                                         :carted={{ $myPurchase->carted() ? 'true' : 'false' }}>
                                                      </cart>


                             </form>
                      </div>

                    </div>

                  </div>
            <!-- description -->
                  <div class="col-md-5 d-flex flex-column justify-content-center">
                    <h5>
                      <b>{{ $myPurchase->name }}</b>

                    </h5>
                    <p style="color: black">
                      {{ $myPurchase->description }}
                    </p>
                    <br>
                    <p style="color: black">
                      <b>Purchase date: </b> {{ $myPurchase->created_at }}
                    </p>

                  </div>
            <!-- download button -->
            <div class="col-md-2 d-flex flex-column justify-content-center">
              <a class="btn green" href="{{  URL::signedRoute(
                'download', ['id'=>$myPurchase->id, ]) }}">
                download</a>
            </div>

        </div>
            @empty
                <p>You didn't purchase any videos yet.</p>
            @endforelse
         </div>
    </div>
</div>
@endsection
