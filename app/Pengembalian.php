<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengembalian extends Model
{
    protected $fillable = ['tipe', 'jumlah', 'tanggal', 'pelanggan_id', 'kode_booking'];
    protected $primaryKey = 'pembayaran_id';
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'pembayarans';

    public function pelanggan()
    {
        return $this->belongsTo('App/Pelanggan', 'pelanggan_id');
    }
}
