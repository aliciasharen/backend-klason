<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    public function Guru()
    {
        return $this->belongsToMany(Guru::class, 'guru_mapel');
    }

    public function Tugas(){
    	return $this->hasMany(Tugas::class, 'mapel_id');
    }
    protected $fillable = ['nama', 'nama_panjang', 'jurusan_id'];
}
