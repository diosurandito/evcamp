<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Organizer extends Authenticatable implements MustVerifyEmail
{	
	use Notifiable;
	
    protected $guarded = [];

    protected $table = 'organizers';
    

     protected $hidden = [
        'password', 'remember_token',
    ];

    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
}
