<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Localization extends Authenticatable
{
  

   protected $table = 'localization';
   
   protected $fillable = [
        'country_id', 'state_id','city_id'
    ];
	
	public function getcity() {
    return $this->hasOne('App\City','id','city_id');
    }

    public function getState() {
    return $this->hasOne('App\State','id','state_id');
   }
   
   public function getCountry() {
    return $this->hasOne('App\Country','id','country_id');
}

    
	
	
	
   
  
}
