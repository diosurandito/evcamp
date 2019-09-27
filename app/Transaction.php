<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Event;
use App\Ticket;
use App\User;

class Transaction extends Model
{
    use SoftDeletes;
    protected $guarded = [];
	protected $table = 'transactions';
    protected $dates = ['deleted_at'];


    public function event()
    {
        return $this->belongsTo('App\Event');
    }

    public function ticket()
    {
        return $this->belongsTo('App\Ticket');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
