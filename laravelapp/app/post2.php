<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post2 extends Model
{
    //
    Public $timestamps = false;
    protected $table = "posts2";
    protected $primaryKey = "id";
    protected $casts = ["id" => "INT"];
}
