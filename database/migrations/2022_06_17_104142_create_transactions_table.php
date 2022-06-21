<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
  
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id_transactions');
            $table->string('transaction_status');
            $table->integer('qty');
            $table->integer('total')->nullable();
            $table->unsignedBigInteger('id_ticket');
            $table->unsignedBigInteger('id_user');
            $table->timestamps();

            $table->foreign('id_ticket')->references('id_ticket')->on('tickets')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
