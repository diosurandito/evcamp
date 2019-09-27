<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Campus extends Model
{
	use SoftDeletes;
	protected $guarded = [];
	protected $table = 'campuses';
    protected $dates = ['deleted_at'];


    public function organizer() 
    {
		return $this->hasMany('App\DataOrganizer', 'id_campus');
	}


 //    public function event() 
 //    {
	// 	return $this->hasMany('App\Event', 'id_campus');
	// }

    
}
