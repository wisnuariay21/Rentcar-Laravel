<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merek extends Model
{
    protected $fillable = ['nama'];
    protected $primaryKey = 'merek_id';

    public function mobil()
    {
        return $this->hasMany('App\Mobil', 'merek_id', 'merek_id');
    }
    
}
