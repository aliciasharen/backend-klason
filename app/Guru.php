<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Guru extends Authenticatable implements JWTSubject
{
    use Notifiable, HasApiTokens;
    protected $fillable = ['nip', 'nama_depan', 'nama_belakang', 'email',
                           'password', 'tgl_lahir',
                           'desc', 'gender', 'agama', 'tingkat_pendidikan',
                           'gelar', 'jabatan', 'wali_kelas', 'avatar', 'no_hp'];

    public function Agama()
    {
        return $this->belongsTo(Agama::class, 'agama', 'id');
    }
    public function Gender()
    {
        return $this->belongsTo(Gender::class, 'gender', 'id');
    }
    public function TingkatPendidikan()
    {
        return $this->belongsTo(TingkatPendidikan::class, 'tingkat_pendidikan', 'id');
    }
    public function Gelar()
    {
        return $this->belongsTo(Gelar::class, 'gelar', 'id');
    }
    public function Jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan', 'id');
    }
    public function Mapel()
    {
        return $this->belongsToMany(Mapel::class, 'guru_mapel');
    }
    public function Tugas()
    {
        return $this->hasMany(Tugas::class, 'guru_id', 'id');
    }
    public function Kelas()
    {
        return $this->belongsToMany(Kelas::class, 'guru_kelas');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
