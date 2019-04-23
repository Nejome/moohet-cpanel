<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternalTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internal_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('from');
            $table->integer('to');
            $table->double('amount');
            $table->timestamps();
            $table->foreign('from')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('internal_transactions');
    }
}
