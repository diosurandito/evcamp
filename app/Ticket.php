<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    protected $fillable = ['id_event','harga','harga_fee','kategori_tiket','stok_tiket'];
	protected $table = 'tickets';
    protected $dates = ['deleted_at'];

    public function event() 
    {
		return $this->belongsTo('App\Event');
	}


	public function trans() 
    {
		return $this->hasMany('App\Transaction', 'id_tiket');
	}
}
