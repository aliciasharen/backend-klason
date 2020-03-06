<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    public function Guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }
    public function Kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
    public function Murid()
    {
        return $this->belongsToMany(Murid::class, 'murid_tugas');
    }
    public function Mapel(){
        return $this->belongsTo(Mapel::class, 'mapel_id');
    }
    protected $fillable = ['nama', 'tgl_mulai', 'deadline', 'guru_id', 'kelas_id', 'mapel_id', 'jurusan_id', 'kategory', 'desc'];
}
