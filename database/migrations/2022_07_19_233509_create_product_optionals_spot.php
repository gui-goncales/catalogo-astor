<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductOptionalsSpot extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_optionals_spot', function (Blueprint $table) {
            $table->string('ProdReference');
            $table->string('Sku')->nullable();
            $table->string('Size')->nullable();
            $table->string('ColorDesc1')->nullable();
            $table->string('ColorHex1')->nullable();
            $table->string('ColorCode')->nullable();
            $table->string('WebSku')->nullable();
            $table->double('SizeLengthCM')->nullable();
            $table->double('SizeWidthCM')->nullable();
            $table->tinyInteger('LastSale')->nullable();
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
        Schema::dropIfExists('product_optionals_spot');
    }
}
