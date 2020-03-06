<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    public function Tingkatan()
    {
        return $this->belongsToMany(Tingkatan::class, 'jurusan_tingkatan');
    }
    public function Murid(){
        return $this->hasMany(Murid::class, 'jurusan', 'id');
    }
    public function Kelas()
    {
        return $this->hasMany(Kelas::class, 'jurusan_id', 'id');
    }

    protected $fillable = ['nama', 'nama_panjang', 'urutan'];
}
