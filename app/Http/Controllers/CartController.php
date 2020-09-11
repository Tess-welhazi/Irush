<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;
use Auth;

class CartController extends Controller
{
    //
    public function shop()
    {
        $videos = Video::all();
        // dd($videos);
        return view('shop')->withTitle('E-COMMERCE STORE | SHOP')->with(['$videos' => $videos]);
    }

    public function cart()  {
       $cartCollection = \Cart::getContent();
       // dd($cartCollection);
       return view('cart.cart')->withTitle('E-COMMERCE STORE | CART')->with(['cartCollection' => $cartCollection]);
   }

   public function add(request $request){


        \Cart::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'image' => $request->img,

        ));
        return back()->with('success_msg', 'Item is Added to Cart!');
    }

// originaly Video was request

    public function VueAdd(Video $video){

        $video1 =Video::find($video->id);

        $id = $video1->id;
        $name = $video1->name;
        $price = $video1->price;
        // $quantity = $video1->quantity;
        $quantity = 1;
        // $image = $video->img;

        \Cart::add(array(
            'id' => $id,
            'name' => $name,
            'price' => $price,
            'quantity' => $quantity,
            // 'image' => $image,
        ));

      Auth::user()->carts()->attach($video->id);

      return back();
    }

    public function VueRemove(Video $video){
      \Cart::remove($video->id);

      Auth::user()->carts()->detach($video->id);
      return back();
    }


    public function remove(request $request)
    {
    \Cart::remove($request->id);
    Auth::user()->carts()->detach($request->id);
    return redirect()->route('cart.index')->with('success_msg', 'Item is removed!');
    }


    public function update(Request $request)
    {
        \Cart::update($request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
        ));
        return redirect()->route('cart.index')->with('success_msg', 'Cart is Updated!');
    }

    public function clear(){
        \Cart::clear();
        return redirect()->route('cart.index')->with('success_msg', 'Car is cleared!');
    }

    public function carted()
    {
      return (bool) Cart::where('user_id', Auth::id())
                          ->where('video_id', $this->id)
                          ->first();
    }

}
