<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Comment extends Authenticatable
{
  

   protected $table = 'comments';
   
   protected $fillable = [
        'driver_id', 'user_id','comment','rating','status'
    ];
	
	

    /**
     * Get the user that owns the phone.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
   
  
}
