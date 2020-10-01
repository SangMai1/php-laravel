<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class model_taisan_chungloai extends Model
{
    protected $table = "model_taisan_chungloais";
    protected $fillable = ['id', 'name', 'id_nhacungcap'];
}
