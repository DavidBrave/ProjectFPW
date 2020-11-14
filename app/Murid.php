<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Murid extends Authenticatable
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
        "Murid_Email",
        "Murid_Photo"
    ];

    public function getAuthPassword(){
        return $this->Murid_Password;
    }
}
