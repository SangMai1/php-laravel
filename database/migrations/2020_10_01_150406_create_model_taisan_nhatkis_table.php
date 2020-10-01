<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelTaisanNhatkisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model_taisan_nhatkis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_nguoidung');
            $table->foreignId('id_taisan');
            $table->timestamp('ngay');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('model_taisan_nhatkis');
    }
}
