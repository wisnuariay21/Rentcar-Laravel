<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mobil extends Model
{
    protected $fillable = ['nama_mobil', 'tahun', 'nopol', 'harga_sewa', 'tipe', 'merek_id', 'status_sewa', 'foto'];
    protected $primaryKey = 'mobil_id';
    use SoftDeletes;
    protected $dates = ['delete_at'];

    public function merek()
    {
        return $this->belongsTo('App\Merek', 'merek_id');
    }

    public function booking()
    {
        return $this->hasMany('App\Booking', 'mobil_id', 'mobil_id');
    }

    public function getFoto()
    {
        if(!$this->foto){
            return asset('front/images/default.jpg');
        }
        return asset('front/images/'.$this->foto);
    }
}
