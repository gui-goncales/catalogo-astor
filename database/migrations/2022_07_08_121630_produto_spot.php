<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProdutoSpot extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto_spot', function (Blueprint $table) {
            $table->string('ProdReference');
            $table->string('Name')->nullable();
            // $table->string('SEOName')->nullable();
            // $table->text('Description')->nullable();
            // $table->text('ShortDescription')->nullable();
            // $table->text('SEOShortDescription')->nullable();
            // $table->text('SEOShortDescriptionCap')->nullable();
            // $table->tinyInteger('IsTextil')->nullable();
            // $table->tinyInteger('HasColors')->nullable();
            // $table->tinyInteger('HasSizes')->nullable();
            // $table->tinyInteger('HasCapacitys')->nullable();
            $table->string('CombinedSizes')->nullable();
            // $table->string('Gender')->nullable();
            // $table->tinyInteger('DefaultCustomizationIncludedInPrice')->nullable();
            // $table->decimal('AvailableGross')->nullable();
            // $table->decimal('BoxLengthMM')->nullable();
            // $table->decimal('BoxWidthMM')->nullable();
            // $table->decimal('BoxHeightMM')->nullable();
            // $table->string('BoxSizeM')->nullable();
            // $table->decimal('BoxWeightKG')->nullable();
            // $table->decimal('BoxVolume')->nullable();
            // $table->integer('BoxQuantity')->nullable();
            // $table->integer('BoxInnerQuantity')->nullable();
            // $table->integer('Multiplier')->nullable();
            // $table->string('Taric')->nullable();
            $table->string('Type')->nullable();
            // $table->integer('TypeCode')->nullable();
            // $table->string('SubType')->nullable();
            // $table->integer('SubTypeCode')->nullable();
            // $table->string('MainImage')->nullable();
            // $table->string('BoxImage')->nullable();
            // $table->string('BagImage')->nullable();
            // $table->string('PouchImage')->nullable();
            // $table->string('AditionalImageList')->nullable();
            // $table->text('AllImageList')->nullable();
            $table->string('Brand')->nullable();
            // $table->string('CountryOfOrigin')->nullable();
            // $table->tinyInteger('PvcFree')->nullable();
            // $table->string('Properties')->nullable();
            // $table->string('ProductCare')->nullable();
            // $table->string('Certificates')->nullable();
            // $table->string('WeightGr')->nullable();
            // $table->string('Composition')->nullable();
            // $table->string('Packing')->nullable();
            // $table->integer('Weight')->nullable();
            // $table->string('Repacking')->nullable();
            // $table->string('RefillType')->nullable();
            // $table->string('BatteryType')->nullable();
            // $table->string('Materials')->nullable();
            // $table->string('PaperSize')->nullable();
            // $table->string('PaperGramage')->nullable();
            // $table->string('CapacityMah')->nullable();
            // $table->string('CapacityGB')->nullable();
            // $table->string('InkColor')->nullable();
            // $table->string('OtherDetails')->nullable();
            // $table->text('KeyWords')->nullable();
            // $table->string('RelatedReferences')->nullable();
            // $table->string('Video360')->nullable();
            // $table->string('VideoLink')->nullable();
            // $table->string('VideoLinkVimeo')->nullable();
            // $table->string('Sizes')->nullable();
            // $table->string('Capacitys')->nullable();
            $table->text('Colors')->nullable();
            // $table->string('ProductComponents')->nullable();
            // $table->string('ProductDefaultComponent')->nullable();
            // $table->string('ProductComponentLocations')->nullable();
            // $table->string('ProductComponentDefaultLocation')->nullable();
            // $table->string('ProductComponentDefaultLocationAreaMM')->nullable();
            // $table->text('ProductComposedLocations')->nullable();
            // $table->string('CustomizationTypes')->nullable();
            // $table->string('CustomizationDefaultType')->nullable();
            // $table->text('CustomizationTables')->nullable();
            // $table->text('CustomizationDefaultTable')->nullable();
            // $table->text('CustomizationTableOptions')->nullable();
            // $table->text('CustomizationTableOptionsMaxColors')->nullable();
            // $table->text('CustomizationTableOptionsHandlingCosts')->nullable();
            // $table->text('CustomizationTableOptionsHandlingCostCodes')->nullable();
            // $table->string('CustomizationDefault')->nullable();
            // $table->integer('CustomizationDefaultTableMaxColors')->nullable();
            // $table->decimal('CustomizationDefaultHandlingCosts')->nullable();
            // $table->string('CustomizationDefaultHandlingCostCode')->nullable();
            // $table->string('CustomizationDefaultPrintingLines')->nullable();
            // $table->tinyInteger('IsSeasonal')->nullable();
            // $table->string('SeasonalOccasion')->nullable();
            // $table->string('SeasonalStartDate')->nullable();
            // $table->string('SeasonalEndDate')->nullable();
            // $table->string('PriceByCapacity')->nullable();
            // $table->tinyInteger('IsStockOut')->nullable();
            // $table->tinyInteger('OnlineExclusive')->nullable();
            // $table->tinyInteger('NewProduct')->nullable();
            // $table->string('YourPrice')->nullable();
            // $table->text('ProductOptionals')->nullable();
            // $table->string('CertificateFiles')->nullable();
            // $table->string('Catalogs')->nullable();
            $table->string('UpdateDate')->nullable();
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
        Schema::dropIfExists('produto_spot');
    }
}
