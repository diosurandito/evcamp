<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Ticket;
use App\Transaction;

class Event extends Model
{
    use SoftDeletes;
    protected $guarded = [];
	protected $table = 'events';
    protected $dates = ['deleted_at'];

    public function ticket() 
    {
		return $this->hasOne('App\Ticket', 'id_event');
	}

	public function trans() 
    {
		return $this->hasMany('App\Transaction', 'id_event');
	}

	public function organizer()
    {
        return $this->belongsTo('App\DataOrganizer');
    }

	// public function campus() 
 //    {
 //    	return $this->belongsTo('App\Campus');
		
	// }

}
