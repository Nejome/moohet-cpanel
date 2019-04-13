<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('sub_category_id');
            $table->string('primary_code');
            $table->string('secondary_code');
            $table->string('tariff_code');
            $table->string('name');
            $table->text('description');
            $table->string('less_amount_text');
            $table->integer('less_amount_value');
            $table->integer('waiting_period');
            $table->double('price');
            $table->float('discount');
            $table->string('company');
            $table->string('company_website');
            $table->string('size_text');
            $table->float('size_value');
            $table->string('color');
            $table->integer('active');
            $table->integer('trash')->default(0);
            $table->timestamps();
            $table->foreign('sub_category_id')
                ->references('id')->on('sub_categories');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
