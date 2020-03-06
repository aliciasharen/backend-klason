<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    public function Guru()
    {
        return $this->hasMany(Guru::class, 'jabatan', 'id');
    }
    protected $fillable = ['nama', 'nama_panjang', 'desc'];
}
