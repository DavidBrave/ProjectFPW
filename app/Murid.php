<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Murid extends Model
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
        "Murid_Email"
    ];

    public function tingkatan()
    {
        return $this->belongsTo(Tingkatan::class,"Murid_Tingkat","Pendidikan_ID");
    }
    public function les()
    {
        return $this->belongsToMany(Les::class,"Pengambilan_Pelajaran","Pengambilan_Murid","Pengambilan_Les")
        ->withPivot("Pengambilan_ID");
    }
}
