<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = "Guru";
    protected $primaryKey = "Guru_ID";
    public $incrementing = false;
    public $timestamps = false;
    protected $guarded = [];
}
