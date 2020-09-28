<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sach extends Model
{
    protected $table = "saches";
    protected $fillable = ['id', 'tensach', 'soluong'];
}
