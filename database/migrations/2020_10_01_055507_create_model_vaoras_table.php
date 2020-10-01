<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelVaorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model_vaoras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_mayquet');
            $table->foreignId('id_nhanvien');
            $table->timestamp('ngay_gio');
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
        Schema::dropIfExists('model_vaoras');
    }
}
