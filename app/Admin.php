<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    public $table = "Admin";
    public $primaryKey = "Admin_ID";
    public $incrementing = false;
    public $timestamps = false;
    public $fillable = [
        "Admin_ID",
        "Admin_Username",
        "Admin_Nama",
        "admin_password"
    ];

    public function getAuthPassword(){
        return $this->admin_password;
    }
}
