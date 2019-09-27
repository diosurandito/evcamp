<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionOffline extends Model
{
   	use SoftDeletes;
    protected $guarded = [];
	protected $table = 'transaction_offlines';
    protected $dates = ['deleted_at'];
}
