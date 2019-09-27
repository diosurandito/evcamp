<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    protected $table = 'users';
    protected $dates = ['deleted_at'];
    protected $fillable = ['nama', 'email', 'alamat', 'jenis_klmn', 'no_telp', 'foto'];

    protected $hidden = [
        'password', 'verifikasi', 'created_at', 'updated_at', 'deleted_at'];

    public function trans()
    {
        return $this->hasMany('App\Transaction', 'id_user');
    }
}
