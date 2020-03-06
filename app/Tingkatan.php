<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tingkatan extends Model
{
    public function Jurusan()
    {
        return $this->belongsToMany(Jurusan::class, 'jurusan_tingkatan');
    }
    public function Kelas()
    {
        return $this->hasMany(Kelas::class, 'tingkatan_id', 'id');
    }
    protected $fillable = ['tingkatan', 'alfabet', 'romawi'];
}
