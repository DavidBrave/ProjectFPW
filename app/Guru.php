<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
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
        "Lampiran"
    ];

    public function les()
    {
        return $this->hasMany(Les::class, "Guru_ID");
    }
}
