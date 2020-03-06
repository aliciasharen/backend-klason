<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengurusKelas extends Model
{
    public function Murid(){
        return $this->hasMany(Murid::class, 'pengurus_kelas', 'id');
    }
    protected $fillable = ['nama'];
}
