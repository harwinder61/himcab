<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Vehicle extends Authenticatable
{
  

   protected $table = 'vehicle';
   
   protected $fillable = [
        'vehicle_name', 'category_id','vehicle_number', 'icon', 'image'
    ];
	
	
	public function getVehicleCategory() {
    return $this->hasOne('App\VehicleCategory','id','category_id');
}
	

   
  
}
