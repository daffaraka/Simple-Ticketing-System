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
            $table->string('nama_pemesan');
            $table->string('email_pemesan');
            $table->integer('nomor_pemesan');
            $table->string('nama_pengunjung');
            $table->string('email_pengunjung');
            $table->integer('nomor_pengunjung');
            $table->integer('jumlah_ticket');
            $table->integer('total');
            $table->unsignedBigInteger('id_ticket');
            $table->unsignedBigInteger('id_user');
            $table->string('status');
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
        Schema::dropIfExists('pemesanans');
    }
}
