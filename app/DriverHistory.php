<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class DriverHistory extends Authenticatable
{
  

   protected $table = 'driverhistory';
   
   protected $fillable = [
        'driver_id', 'start', 'destination', 'earning'
    ];

   
  
}
