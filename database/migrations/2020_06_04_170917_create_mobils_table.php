<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMobilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobils', function (Blueprint $table) {
            $table->increments('mobil_id');
            $table->string('nama');
            $table->integer('tahun');
            $table->string('nopol', 10);
            $table->integer('harga_sewa');
            $table->enum('tipe', ['manual', 'matic']);
            $table->integer('merek_id')->unsigned();
            $table->foreign('merek_id')->references('merek_id')->on('mereks');
            $table->enum('status_sewa', ['1', '0'])->default('1');
            $table->string('foto', 255);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mobils');
    }
}
