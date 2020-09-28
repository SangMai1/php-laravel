<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class thuesach extends Model
{
    protected $table = "thuesaches";
    protected $fillable = ['id', 'idsach_thue', 'nguoi_thue', 'soluong_thue', 'ngay_thue'];
}
