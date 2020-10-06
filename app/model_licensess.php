<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class model_licensess extends Model
{
    protected $table = "model_licensesses";
    protected $fillable = ['id', 'sach', 'trang_thai', 'ngay_dung'];
}
