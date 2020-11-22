<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Murid extends Authenticatable
{
    protected $table = "Murid";
    protected $primaryKey = "Murid_ID";
    public $incrementing = false;
    public $timestamps = false;
    public $fillable = [
        "Murid_ID",
        "Murid_Username",
        "Murid_Password",
        "Murid_Nama",
        "Murid_Tingkat",
        "Murid_Email",
        "Murid_Photo"
    ];

    public function tingkatan()
    {
        return $this->belongsTo(Tingkat::class,"Murid_Tingkat","Pendidikan_ID");
    }

    public function les()
    {
        return $this->belongsToMany(Les::class,"Pengambilan_Pelajaran","Pengambilan_Murid","Pengambilan_Les")->withPivot("Pengambilan_Status");
    }

    public function getAuthPassword(){
        return $this->Murid_Password;
    }

    public function pengambilan()
    {
        return $this->belongsToMany(Les::class, "Pengambilan_Pelajaran", "Pengambilan_Murid", "Pengambilan_Les");
    }
}
