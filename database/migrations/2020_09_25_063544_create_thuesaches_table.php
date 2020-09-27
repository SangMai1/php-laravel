<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThuesachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thuesaches', function (Blueprint $table) {
            $table->id();
            $table->foreignId("idsach_thue");
            $table->string("nguoi_thue");
            $table->integer("soluong_thue");
            $table->date("ngay_thue");
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
        Schema::dropIfExists('thuesaches');
    }
}
