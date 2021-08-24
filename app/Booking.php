<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    protected $fillable = ['kode_booking', 'tgl_order', 'durasi', 'tgl_kembali_harusnya', 'tgl_kembali', 'supir', 'tujuan', 'harga', 'status', 'denda', 'denda_kerusakan', 'mobil_id', 'pelanggan_id'];
    protected $primaryKey = 'booking_id';
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function mobil()
    {
        return $this->belongsTo('App/Mobil', 'mobil_id');
    }
    public function pelanggan()
    {
        return $this->belongsTo('App/Pelanggan', 'pelanggan_id');
    }
}
