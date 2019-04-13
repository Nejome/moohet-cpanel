<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayTabsTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay_tabs_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id');
            $table->string('response_code');
            $table->string('result');
            $table->string('pt_invoice_id');
            $table->integer('amount');
            $table->string('reference_no');
            $table->string('transaction_id');
            $table->string('status');
            $table->string('type'); /* 1=Charge 2=Buy */
            $table->string('payment_reference');
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
        Schema::dropIfExists('pay_tabs_transactions');
    }
}
