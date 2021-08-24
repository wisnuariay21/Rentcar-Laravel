<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->increments('pembayaran_id');
            $table->enum('tipe', ['dp', 'repayment']);
            $table->integer('jumlah');
            $table->date('tanggal');

            $table->integer('pelanggan_id')->unsigned();
            $table->foreign('pelanggan_id')->references('pelanggan_id')->on('pelanggans');

            $table->string('kode_booking')->references('booking_id')->on('bookings');;

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
        Schema::dropIfExists('pembayarans');
    }
}
