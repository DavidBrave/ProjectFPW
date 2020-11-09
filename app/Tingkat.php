<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tingkat extends Model
{
    public $table = "Tingkat_Pendidikan";
    public $primaryKey = "Pendidikan_ID";
    public $incrementing = false;
    public $timestamps = false;
    public $fillable = [
        "Pendidikan_ID",
        "Pendidikan_Keterangan"
    ];

    public function les()
    {
        return $this->hasMany(Les::class, "Tingkatan_ID", "Pendidikan_ID");
    }
}
