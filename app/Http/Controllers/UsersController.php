<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Video;
use App\User;
use App\Favorite;

class UsersController extends Controller
{
    public function myFavorites()
    {
        $myFavorites = Auth::user()->favorites;

        return view('users.my_favorites', compact('myFavorites'));
    }

    public function myPurchases()
    {
        $myPurchases = Auth::user()->purchases;

        return view('users.purchases', compact('myPurchases'));
    }

    public function index(User $user)
    {
      $videos = Video::where('user_id','=', $user->id)->latest()->paginate(6);
      // $myFavorites = Auth::user()->favorites;
      $temp = $user->favorites;
      $myFavorites = $user->favorites;

      // $myFavorites = Video::where('user_id','=', $user->id)->favorites;
      return view('users.profile', compact('myFavorites','user','videos'));
    }




}
