<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Booking extends Authenticatable
{
  

   protected $table = 'booking_tbl';
   
   protected $fillable = [
        'user_id', 'source','destination','status','lat','lng'
    ];

    /**
     * Get the user that owns the phone.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
	
	
  
}
