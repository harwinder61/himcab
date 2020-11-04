<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Dummyimage extends Authenticatable
{
  

   protected $table = 'dummy_image';
   
   protected $fillable = [
        'image'
    ];

}
	
