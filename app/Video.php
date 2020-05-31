<?php

namespace App;

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
}
