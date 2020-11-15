<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Guru extends Authenticatable
{
    public $table = "Guru";
    public $primaryKey = "Guru_ID";
    public $incrementing = false;
    public $timestamps = false;
    public $fillable = [
        "Guru_ID",
        "Guru_Username",
        "Guru_Password",
        "Guru_Nama",
        "Guru_Email",
        "Guru_Alamat",
        "Diterima",
        "Guru_Photo"
    ];

    public function les()
    {
        return $this->hasMany(Les::class, "Guru_ID");
    }

    public function sertifikat()
    {
        return $this->hasMany(Sertifikat::class, "Guru_ID");
    }
  
    public function getAuthPassword()
    {
        return $this->Guru_Password;
    }
}
