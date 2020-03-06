<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    public function Guru()
    {
        return $this->belongsToMany(Guru::class, 'guru_kelas');
    }
    public function Murid(){
        return $this->hasMany(Murid::class, 'kelas', 'id');
    }
    public function Tugas(){
        return $this->hasMany(Tugas::class, 'kelas_id', 'id');
    }
    public function Jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id', 'id');
    }
    public function Tingkatan()
    {
        return $this->belongsTo(Tingkatan::class, 'tingkatan_id', 'id');
    }

    protected $fillable = ['kelas', 'nama_panjang', 'tingkatan_id', 'jurusan_id'];
}
