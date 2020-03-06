<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gelar extends Model
{
    public function Guru()
    {
        return $this->hasMany(Guru::class ,'gelar', 'id');
    }

    protected $fillable = ['nama', 'desc'];
}
