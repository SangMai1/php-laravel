<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phongban extends Model
{
    protected $table = "phongban";
    protected $fillable = ['id','name'];
}
