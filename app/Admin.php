<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    public $table = "Admin";
    public $primaryKey = "Admin_ID";
    public $incrementing = false;
    public $timestamps = false;
    public $fillable = [
        "Admin_ID",
        "Admin_Username",
        "Admin_Nama",
        "Admin_Password"
    ];
}
