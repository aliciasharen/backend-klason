<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    public function Gender()
    {
        return $this->belongsTo(Gender::class, 'gender', 'id');
    }
    public function Kelas(){
        return $this->belongsTo(Kelas::class, 'kelas', 'id');
    }
    public function Jurusan(){
        return $this->belongsTo(Jurusan::class, 'jurusan', 'id');
    }
    public function PengurusKelas()
    {
        return $this->belongsTo(PengurusKelas::class, 'pengurus_kelas');
    }
    public function Agama()
    {
        return $this->belongsTo(Agama::class, 'agama',);
    }
    public function TahunAjaran()
    {
        return $this->belongsTo(TahunAjaran::class, 'tahun_ajaran');
    }
    public function Tugas()
    {
        return $this->belongsToMany(Tugas::class, 'murid_tugas');
    }
    protected $fillable = ['nis', 'nama_depan', 'nama_belakang', 'email', 'password', 'no_tlp',
                           'alamat', 'tgl_lahir', 'nama_wali', 'no_tlp_wali',
                           'alamat_wali', 'gender', 'kelas', 'jurusan', 'pengurus_kelas',
                           'agama', 'tahun_ajaran', 'avatar'];

    protected $hidden = ['password'];

}
