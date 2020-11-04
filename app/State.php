<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class State extends Authenticatable
{
  

   protected $table = 'tbl_states';
   
   protected $fillable = [
        'name', 'country_id'
    ];
	
	
}
	

