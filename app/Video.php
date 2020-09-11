<?php

namespace App;
use App\Favorite;
use Auth;

use Illuminate\Database\Eloquent\Model;


class Video extends Model
{
    protected $fillable = [
      'price', 'name', 'description', 'user_id', 'videoFile'
    ];

    public function user()
   {
     return $this->belongsTo(User::class);
   }

   public function categories()
  {
      return $this->belongsToMany('App\Category')->withTimeStamps();;
  }

  public function favorited()
  {
      return (bool) Favorite::where('user_id', Auth::id())
                          ->where('video_id', $this->id)
                          ->first();
  }

  public function carted()
  {
    return (bool) Cart::where('user_id', Auth::id())
                        ->where('video_id', $this->id)
                        ->first();
  }

}
