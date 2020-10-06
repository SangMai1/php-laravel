<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class model_dausachs extends Model
{
    protected $table = "model_dausachs";
    protected $fillable = ['id', 'name', 'gia', 'lop'];
}
