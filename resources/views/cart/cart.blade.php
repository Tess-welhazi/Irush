
@extends('layouts.app')

@section('content')
    <div class="cart-container" style="margin-top: 20px">

        @if(session()->has('success_msg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session()->get('success_msg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif
        @if(session()->has('alert_msg'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session()->get('alert_msg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif
        @if(count($errors) > 0)
            @foreach($errors0>all() as $error)
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ $error }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endforeach
        @endif

        @if(\Cart::getTotalQuantity()>0)
            <h4 style="margin-left: 1rem;">{{ \Cart::getTotalQuantity()}} Product(s) In Your Cart</h4><br>
        @else
          <div class="empty-cart d-flex flex-column align-items-center justify-content-center">
            <h4 style="color: #7C9CBF; font-family: IBM Plex Sans; margin-bottom: 3rem;">No Product(s) In Your Cart</h4><br>
            <a href="/" class="btn  btn-info blue col-lg-3">Continue Shopping</a>
          </div>

        @endif
        <div class="row justify-content-center">

            <div class="col-lg-6">
                <br>


                @foreach($cartCollection as $item)
                    <div class="row white align-items-center" style="margin-bottom: 1rem;">
                        <div class="">
                            <img src="{{asset('storage/img') . $item->imageFile }}" class="img-thumbnail" width="150" height="100">
                        </div>
                        <div class="col-lg-5">
                            <p style="color: black">
                                <b><a href="{{ route('videos.show',$item->id) }}">{{ $item->name }}</a></b><br>

                                  </p>
                        </div>

                        <div class="col-lg-2">
                          <p style="color: black">
                            <b> ${{ $item->price }} </b>
                          </p>
                        </div>
                        <div class="col-lg-1">
                            <div class="row">

                                <form action="{{ route('cart.remove') }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" value="{{ $item->id }}" id="id" name="id">
                                    <button class="btn red-btn btn-sm" style="margin-right: 10px; padding: 0.5rem 1rem 0.5rem 1rem"><i class="fa fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>

                @endforeach
                @if(count($cartCollection)>0)
                    <form action="{{ route('cart.clear') }}" method="POST">
                        {{ csrf_field() }}
                        <button class="btn btn-info blue col-lg-6" style="margin-left: -15px;">Clear Cart</button>
                    </form>
                @endif
            </div>
            @if(count($cartCollection)>0)
                <div class="col-lg-5 flex-row align-items-center  cart-side">

                    <div class="card col-lg-6 d-flex flex-row justify-content-space-between" style="border: none; margin-bottom: 1rem; padding-top: 1rem;">
                            <p style="color: black"> <b>Total: </b> </p>
                            <p style="color: black">${{ \Cart::getTotal() }}</p>

                    </div>

                    <a href="/" class="btn btn-info blue col-lg-6" style="margin-bottom: 1rem;">Continue Shopping</a>

                    <form action="{{ route('cart.checkout') }}" method="POST">
                      {{ csrf_field() }}
                      <button  class="btn green col-lg-6">Proceed To Checkout</button>
                    </form>
                </div>
            @endif
        </div>
        <br><br>
    </div>
@endsection
