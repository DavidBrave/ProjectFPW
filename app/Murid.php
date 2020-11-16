<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    protected $table = "Murid";
    protected $primaryKey = "Murid_ID";
    public $incrementing = false;
    public $timestamps = false;
    protected $guarded = [];

    public function tingkatan()
    {
        return $this->belongsTo(Tingkatan::class,"Murid_Tingkat","Pendidikan_ID");
    }
    public function les()
    {
        return $this->belongsToMany(Les::class,"Pengambilan_Pelajaran","Pengambilan_Murid","Pengambilan_Les")->withPivot("Pengambilan_Status");
    }
}
