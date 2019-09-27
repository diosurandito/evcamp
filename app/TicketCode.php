<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class TicketCode extends Model
{
    use SoftDeletes;
    protected $guarded = [];
	protected $table = 'ticket_codes';
    protected $dates = ['deleted_at'];
}
