<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    //
    Public $timestamps = true;
    protected $name = 'name';
    protected $email = 'email';
    protected $phone = 'phone';
    protected $primaryKey = "id";
    protected $casts = ['id' => 'int'];
}
