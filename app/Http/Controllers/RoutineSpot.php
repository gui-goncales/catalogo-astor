<?php

namespace App\Http\Controllers;

use App\Jobs\refreshDatabase;
use App\Jobs\refreshStock;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class RoutineSpot extends Controller
{
    public static function needUpdate()
    {
        //Calculo Data Produtos Total
        $ultimoProdutos = DB::table('produto_spot')->latest('ProdReference')->first();

        if (!is_null($ultimoProdutos)) {
            $diffProdutos = Carbon::now()->diffInMinutes($ultimoProdutos->created_at);
        }

        if (@$diffProdutos >= 10080 || is_null($ultimoProdutos)){
            refreshDatabase::dispatch();
        }

        //Calculo Data Estoque Produtos
        $ultimoEstoque = DB::table('sku_quantity_spot')->latest('sku')->first();

        if (!is_null($ultimoEstoque)) {
            $diffEstoque = Carbon::now()->diffInMinutes($ultimoEstoque->created_at);
        }

        if (@$diffEstoque >= 15 || is_null($ultimoEstoque)) {
            refreshStock::dispatch();
        }

    }
}
