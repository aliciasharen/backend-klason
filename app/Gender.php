<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    public function Admin()
    {
        return $this->hasMany(Admin::class, 'gender_id', 'id');
    }
    public function Guru()
    {
        return $this->hasMany(Guru::class, 'gender', 'id');
    }
    public function Murid()
    {
        return $this->hasMany(Murid::class, 'gender', 'id');
    }

    protected $fillable = ['name', 'alfabet'];
}
