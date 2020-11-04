<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class City extends Authenticatable
{
  

   protected $table = 'tbl_cities';
   
   protected $fillable = [
        'name', 'state_id'
    ];
	
	
  
}
