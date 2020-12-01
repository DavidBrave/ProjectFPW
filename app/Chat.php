<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    public $table = "Chat";
    public $primaryKey = "Chat_ID";
    public $timestamps = false;
    public $guarded = [];

    public function les()
    {
        $this->belongsTo(Les::class, "Les_ID", "Les_ID");
    }
}
