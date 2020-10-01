<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class model_nguoidung extends Model
{
    protected $table = "model_nguoidungs";
    protected $fillable = ['id', 'name', 'id_phongban'];
}
