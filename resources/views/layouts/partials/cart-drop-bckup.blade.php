@if(count(\Cart::getContent()) > 0)
    @foreach(\Cart::getContent() as $item)
        <li class="list-group-item">
            <div class="row">
                <div class="col-lg-3">
                    <img src="/images/{{ $item->attributes->image }}"
                         style="width: 50px; height: 50px;"
                    >
                </div>
                <div class="col-lg-6">
                    <b>{{$item->name}}</b>
                    <br><small>Qty: {{$item->quantity}}</small>
                </div>
                <div class="col-lg-3">
                    <p>${{ \Cart::get($item->id)->getPriceSum() }}</p>
                </div>
                <hr>
            </div>
        </li>

        <!-- <li class="nav-item dropdown"></li> -->
        <!-- remember to change id name 2 -->



    @endforeach

@endif

<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown2">
  <div class="row">
      <div class="col-lg-3">
          <img src="/images/cat.jpg"
               style="width: 50px; height: 50px;"
          >
      </div>
      <div class="col-lg-6">
          <b>Boat dog</b>
          <br><small>Qty: 1</small>
      </div>
      <div class="col-lg-3">
          <p>10 dt</p>
      </div>
      <hr>
  </div>
</div>
--------------------------------------------------------
<div class="row">
    <div class="col-lg-3">
        <img src="/images/cat.jpg"
             style="width: 50px; height: 50px;"
        >
    </div>
    <div class="col-lg-6">
        <b>Boat dog</b>
        <br><small>Qty: 1</small>
    </div>
    <div class="col-lg-3">
        <p>10 dt</p>
    </div>
    <hr>
</div>
