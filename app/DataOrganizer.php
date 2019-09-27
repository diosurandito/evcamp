<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataOrganizer extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    protected $table = 'organizers';
    protected $dates = ['deleted_at'];
    protected $fillable = ['nama', 'email', 'id_campus', 'no_rek', 'no_telp', 'foto_ktm', 'foto'];

    protected $hidden = [
        'password', 'remember_token', 'email_verified_at', 'created_at', 'updated_at', 'deleted_at'];

    public function event()
    {
        return $this->hasMany('App\Event', 'id_event');
    }

    public function campus() 
    {
		return $this->belongsTo('App\Campus');
	}
}
