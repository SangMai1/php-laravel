<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class model_taisan_taisan extends Model
{
    protected $table = "model_taisan_taisans";
    protected $fillable = ['id', 'name', 'id_chungloai', 'id_nguoidung'];
}
