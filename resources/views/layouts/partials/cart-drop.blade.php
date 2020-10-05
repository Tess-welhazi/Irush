
@if(count(\Cart::getContent()) > 0)
    @foreach(\Cart::getContent() as $item)
            <div class="row padding-2">
                <div class="col-lg-3">
                    <img src="{{asset('storage/img/'. $item->imageFile)}}"
                         style="width: 50px; height: 50px;"
                    >
                </div>
                <div class="col-lg-8">
                    {{$item->name}}

                </div>

                <hr>
            </div>
    @endforeach
    <br>
         <div class="row padding-2">
            <div class="col-lg-8" style="background-color: #F7F9F9; padding-top: 1.5rem; padding-bottom: 1.5rem">
                <b>Total: </b>${{ \Cart::getTotal() }}
            </div>
            <div class="col-lg-2">
                <form action="{{ route('cart.clear') }}" method="POST">
                    {{ csrf_field() }}
                    <button class="btn btn-sm red-btn" style=""><i class="fa fa-trash"></i></button>
                </form>
            </div>
        </div>


    <br>
    <div class="row padding-2" style="padding-right: 2rem;padding-left: 2rem;">
        <a class="btn green btn-sm btn-block" href="{{ route('cart.index') }}">
            CART <i class="fa fa-arrow-right"></i>
        </a>
        <a class="btn green btn-sm btn-block" href="">
            CHECKOUT <i class="fa fa-arrow-right"></i>
        </a>
    </div>
@else
<div class="row">

    <div class="col-lg-6">
      <a class="dropdown-item">no items in cart</a>
    </div>
</div>
@endif
