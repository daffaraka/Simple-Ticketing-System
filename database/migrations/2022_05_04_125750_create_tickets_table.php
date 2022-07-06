<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->bigIncrements('id_ticket');
            $table->string('ticket_name');
            $table->date('concert_date');
            $table->string('ticket_image');
            $table->unsignedBigInteger('id_artist');
            $table->unsignedBigInteger('id_venue');
            $table->unsignedBigInteger('id_user');

            $table->timestamps();


            $table->foreign('id_artist')->references('id_artist')->on('artists')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_venue')->references('id_venue')->on('venues')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
