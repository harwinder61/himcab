<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Blog extends Authenticatable
{
	protected $table = 'blog';

	protected $fillable = ['id','title','url','image','blog']; 
  
}
