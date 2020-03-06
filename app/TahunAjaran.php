<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TahunAjaran extends Model
{
    public function Murid()
    {
        return $this->hasMany(Murid::class, 'tahun_ajaran', 'id');
    }
    protected $fillable = ['tahun_ajaran', 'mulai', 'sampai', 'aktif'];
}
