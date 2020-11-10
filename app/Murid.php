<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    public $table = "Murid";
    public $primaryKey = "Murid_ID";
    public $incrementing = false;
    public $timestamps = false;
    public $fillable = [
        "Murid_ID",
        "Murid_Username",
        "Murid_Password",
        "Murid_Nama",
        "Murid_Tingkat",
        "Murid_Email"
    ];

    public function pengambilan()
    {
        return $this->belongsToMany(Les::class, "Pengambilan_Pelajaran", "Pengambilan_Murid", "Pengambilan_Les");
    }
}
