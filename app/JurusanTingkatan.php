<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JurusanTingkatan extends Model
{
    protected $table = 'jurusan_tingkatan';
    public function Guru()
    {
        return $this->belongsToMany(Guru::class, 'guru_kelas');
    }
    public function Murid(){
        return $this->hasMany(Murid::class, 'kelas', 'id');
    }
}
