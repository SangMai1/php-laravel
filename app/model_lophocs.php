<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class model_lophocs extends Model
{
    protected $table = "model_lophocs";
    protected $fillable = ['id', 'name', 'cap'];
}
