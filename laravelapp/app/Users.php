<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    //
    public $timestamps = false;
    protected $table = "tbl_user";
    protected $primaryKey = "id";
    protected $casts = ["id" => "INT"];

    protected $fillable = ['Username', 'Password', 'created_at', 'updated_at'];
}
