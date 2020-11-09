<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelajaran extends Model
{
    public $table = "Mata_Pelajaran";
    public $primaryKey = "Pelajaran_ID";
    public $incrementing = false;
    public $timestamps = false;
    public $fillable = [
        "Pelajaran_ID",
        "Pelajaran_Nama"
    ];

    public function les()
    {
        return $this->hasMany(Les::class, "Pelajaran_ID");
    }
}
