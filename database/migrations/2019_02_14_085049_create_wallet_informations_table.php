<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWalletInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallet_informations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id');
            $table->float('purchases_total');
            $table->float('sales_total');
            $table->float('current_balance');
            $table->date('last_balance_conversion')->nullable();
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
        Schema::dropIfExists('wallet_informations');
    }
}
