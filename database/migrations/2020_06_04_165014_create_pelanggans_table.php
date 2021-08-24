<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePelanggansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelanggans', function (Blueprint $table) {
            $table->increments('pelanggan_id');
            $table->string('nik')->unique();
            $table->string('nama');
            $table->date('tanggal_lahir');
            $table->string('telepon', 15);
            $table->string('alamat');
            $table->enum('jenkel', ['laki-laki', 'perempuan']);
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
        Schema::dropIfExists('pelanggans');
    }
}
