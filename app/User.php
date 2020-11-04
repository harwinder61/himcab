<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'city','phone','password','user_type','block_status','OfflineAndOnline','device_type','device_token','loginwith','lat','lng','user_img'
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

    /**
     * Get the phone record associated with the user.
     */
    public function driver_doc()
    {
        return $this->hasOne('App\Driverdoc','driver_id');
    }

    /**
     * Get the comment for user record associated with the user.
     */
    public function user_comment()
    {
        return $this->hasOne('App\Comment','user_id');
    }

    /**
     * Get the comment for user record associated with the user.
     */
    public function driver_comment()
    {
        return $this->hasOne('App\Comment','driver_id');
    }

    /**
     * Get the comment for user record associated with the user.
     */
    public function userridebooking()
    {
        return $this->hasOne('App\Booking','user_id');
    }
}
