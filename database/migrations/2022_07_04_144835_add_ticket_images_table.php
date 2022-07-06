<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTicketImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_image', function (Blueprint $table) {
            $table->bigIncrements('id_ticket_image');
            $table->string('ticket_image');
            $table->string('e_ticket');
            $table->unsignedBigInteger('id_ticket');
            $table->timestamps();


            $table->foreign('id_ticket')->references('id_ticket')->on('tickets')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
