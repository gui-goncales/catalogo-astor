<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            // $table->integer('IdPessoa');
            // $table->integer('IdProduto');
            // $table->string('CodigoXbz');
            $table->string('CodigoComposto');
            // $table->string('CodigoAmigavel');
            $table->string('Nome');
            // $table->string('SiteLink', 200);
            $table->string('ImageLink', 400);
            // $table->integer('WebTipoId');
            // $table->string('WebTipo');
            // $table->integer('WebSubTipoId');
            // $table->string('WebSubTipo');
            $table->integer('CorWebPrincipalId');
            $table->string('CorWebPrincipal');
            // $table->integer('CorWebSecundariaId');
            // $table->string('CorWebSecundaria');
            // $table->decimal('Peso', 8, 2);
            // $table->decimal('Altura', 8, 2);
            // $table->decimal('Largura', 8, 2);
            // $table->decimal('Profundidade', 8, 2);
            $table->decimal('PrecoVenda', 8, 2);
            // $table->tinyInteger('PontaDeEstoque');
            $table->integer('QuantidadeDisponivel');
            $table->integer('IdStatusConfiabilidade');
            $table->string('Ncm');
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
        Schema::dropIfExists('products');
    }
}
