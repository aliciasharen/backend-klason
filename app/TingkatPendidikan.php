<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TingkatPendidikan extends Model
{
    public function Guru()
    {
        return $this->hasMany(TingkatPendidikan::class, 'tingkat_pendidikan', 'id');
    }
    protected $fillable = ['nama', 'nama_panjang', 'desc'];
}
