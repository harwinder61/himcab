<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Driverdoc extends Authenticatable
{
  

   protected $table = 'driverdocument';
   
   protected $fillable = [
        'driver_id', 'vehicle_insurance', 'driving_license', 'driver_id_proof','driver_licence_no','adhar_card_no','vehicle_no','chassi_no','police_verification','driver_licence','adhar_card','vehicle','chassi'
    ];

     /**
     * Get the user that owns the phone.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

   
  
}
