<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkuQuantitySpot extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sku_quantity_spot', function (Blueprint $table) {
            $table->string("Sku");
            $table->integer("Quantity")->nullable();
            $table->string("NextQuantity1")->nullable();
            $table->string("NextDate1")->nullable();
            $table->string("NextQuantity2")->nullable();
            $table->string("NextDate2")->nullable();
            $table->string("NextQuantity3")->nullable();
            $table->string("NextDate3")->nullable();
            $table->string("NextQuantity4")->nullable();
            $table->string("NextDate4")->nullable();
            $table->string("NextQuantity5")->nullable();
            $table->string("NextDate5")->nullable();
            $table->string("NextQuantity6")->nullable();
            $table->string("NextDate6")->nullable();
            $table->string("WebSku")->nullable();
            $table->string("Country")->nullable();
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
        Schema::dropIfExists('sku_quantity_spot');
    }
}
