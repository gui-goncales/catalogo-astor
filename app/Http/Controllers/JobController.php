<?php

namespace App\Http\Controllers;

use App\Jobs\RefreshDatabase;
use App\Jobs\RefreshDataBaseXbz;
use App\Jobs\RefreshStock;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
    public function refreshDatabaseXbz()
    {
       //Calculo Data
       $ultimo = DB::table('produtos')->latest('CodigoComposto')->first();

       if(!is_null($ultimo))
       {
           $diff = Carbon::now()->diffInMinutes($ultimo->created_at);
       }
       
       if(@$diff >= 60 || is_null($ultimo))
       {
            RefreshDataBaseXbz::dispatch();
       }
    }

    public function refreshDatabaseSpot()
    {
        //Calculo Data Produtos Total
        $ultimoProdutos = DB::table('produto_spot')->latest('ProdReference')->first();

        if (!is_null($ultimoProdutos)) {
            $diffProdutos = Carbon::now()->diffInMinutes($ultimoProdutos->created_at);
        }

        if (@$diffProdutos >= 10080 || is_null($ultimoProdutos)) {
            RefreshDatabase::dispatch();
        }

        //Calculo Data Estoque Produtos
        $ultimoEstoque = DB::table('sku_quantity_spot')->latest('sku')->first();

        if (!is_null($ultimoEstoque)) {
            $diffEstoque = Carbon::now()->diffInMinutes($ultimoEstoque->created_at);
        }

        if (@$diffEstoque >= 15 || is_null($ultimoEstoque)) {
            RefreshStock::dispatch();
        }
    }
}
