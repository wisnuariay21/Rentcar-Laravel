<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pelanggan extends Model
{
    protected $fillable = ['nik', 'nama', 'tanggal_lahir', 'telepon', 'alamat', 'jenkel'];
    protected $primaryKey = 'pelanggan_id';
    use SoftDeletes;
    protected $dates = ['delete_at'];
    public function booking()
    {
        return $this->hasMany('App\Booking', 'pelanggan_id', 'pelanggan_id');
    }
    public function pembayaran()
    {
        return $this->hasMany('App\Pengembalian', 'pelanggan_id', 'pelanggan_id');
    }
}
