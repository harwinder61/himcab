<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class DriverPersonalDetail extends Authenticatable
{
  

   protected $table = 'driverpersonaldetail';
   
   protected $fillable = [
        'driver_id', 'driver_licence_no','adhar_card_no','vehicle_no','chassi_no','created_at','updated_at'
    ];
	
	
}