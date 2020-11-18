<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sertifikat extends Model
{
    public $table = "Sertifikat";
    public $timestamps = false;
    public $fillable = [
        "id",
        "Guru_ID",
        "Sertifikat_Photo"
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
}
