<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('booking_id');
            $table->string('kode_booking');
            $table->date('tgl_order');
            $table->integer('durasi');
            $table->date('tgl_kembali_harusnya');
            $table->date('tgl_kembali')->nullable();
            $table->string('supir')->nullable();
            $table->enum('kota', ['dalam_kota', 'luar_kota']);
            $table->integer('harga');
            $table->enum('status', ['lunas', 'proses']);
            $table->string('denda')->nullable();
            $table->string('denda_kerusakan')->nullable();

            $table->integer('mobil_id')->unsigned();
            $table->foreign('mobil_id')->references('mobil_id')->on('mobils');

            $table->integer('pelanggan_id')->unsigned();
            $table->foreign('pelanggan_id')->references('pelanggan_id')->on('pelanggans');

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
        Schema::dropIfExists('bookings');
    }
}
