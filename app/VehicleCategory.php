<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class VehicleCategory extends Authenticatable
{
  

   protected $table = 'vehicle_category';
   
   protected $fillable = [
        'user_id', 'category_name'
    ];

   
  
}
