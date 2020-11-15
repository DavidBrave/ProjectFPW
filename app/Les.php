<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Les extends Model
{
    public $table = "Les";
    public $primaryKey = "Les_ID";
    public $incrementing = false;
    public $timestamps = false;

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    public function pelajaran()
    {
        return $this->belongsTo(Pelajaran::class);
    }

    public function tingkatan()
    {
        return $this->belongsTo(Tingkat::class, "Tingkatan_ID", "Pendidikan_ID");
    }

    public function pengambilan()
    {
        return $this->belongsToMany(Murid::class, "Pengambilan_Pelajaran", "Pengambilan_Les", "Pengambilan_Murid");
    }
}
