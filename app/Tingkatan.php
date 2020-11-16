<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tingkatan extends Model
{
    protected $table = "Tingkat_Pendidikan";
    protected $primaryKey = "Pendidikan_ID";
    public $incrementing = false;
    public $timestamps = false;
    protected $guarded = [];
}
