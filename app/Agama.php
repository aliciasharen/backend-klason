<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
    public function Admin()
    {
        return $this->hasMany(Admin::class, 'agama', 'id');
    }
    public function Guru()
    {
        return $this->hasMany(Guru::class, 'agama', 'id');
    }
    public function Murid()
    {
        return $this->hasMany(Murid::class, 'agama', 'id');
    }
    protected $fillable = ['nama'];
}
