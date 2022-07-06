<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->bigIncrements('id_pemesanan');
            $table->string('nama_pengunjung');
            $table->string('email_pengunjung');
            $table->integer('nomor_pengunjung');
            $table->string('nomor_identitas');
            $table->string('type_identitas');
            $table->string('gambar_identitas');
            $table->integer('jumlah_ticket');
            $table->integer('total');
          
            $table->unsignedBigInteger('id_ticket');
            $table->unsignedBigInteger('id_ticket_category');
            $table->unsignedBigInteger('id_user');
            $table->string('status');
            $table->string('bukti_pembayaran')->nullable();
            $table->timestamps();


            $table->foreign('id_ticket')->references('id_ticket')->on('tickets')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_ticket_category')->references('id_categories')->on('ticket_categories')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemesanans');
    }
}
