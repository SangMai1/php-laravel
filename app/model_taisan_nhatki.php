<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class model_taisan_nhatki extends Model
{
    protected $table = "model_taisan_nhatkis";
    protected $fillable = ['id','id_taisan', 'id_nguoidung', 'ngay'];
}
