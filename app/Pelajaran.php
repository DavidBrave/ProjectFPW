<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelajaran extends Model
{
    protected $table = "Mata_Pelajaran";
    protected $primaryKey = "Pelajaran_ID";
    public $incrementing = false;
    public $timestamps = false;
    protected $guarded = [];
}
