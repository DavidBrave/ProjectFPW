<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Les extends Model
{
    use SoftDeletes;
    protected $table = "Les";
    protected $primaryKey = "Les_ID";
    public $incrementing = false;
    public $timestamps = false;
    public $guarded = [];

    public function murid()
    {
        return $this->belongsToMany(Murid::class,"Pengambilan_Pelajaran","Pengambilan_Les","Pengambilan_Murid")->withPivot("Pengambilan_Status");
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class,"Guru_ID","Guru_ID");
    }

    public function pelajaran()
    {
        return $this->belongsTo(Pelajaran::class,"Pelajaran_ID","Pelajaran_ID");
    }

    public function tingkatan()
    {
        return $this->belongsTo(Tingkat::class,"Tingkatan_ID","Pendidikan_ID");
    }
}
