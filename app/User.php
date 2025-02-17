<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_admin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function favorites()
    {
        return $this->belongsToMany(Video::class, 'favorites', 'user_id', 'video_id')->withTimeStamps();
    }

    public function carts()
    {
        return $this->belongsToMany(Video::class, 'carts', 'user_id', 'video_id')->withTimeStamps();
    }

    public function purchases()
    {
        return $this->belongsToMany(Video::class, 'purchases', 'user_id', 'video_id')->withTimeStamps();
    }

}
