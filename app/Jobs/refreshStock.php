<?php

namespace App\Jobs;

use App\Models\SkuQuantity;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class RefreshStock implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $ACCESS_KEY;

    const EMPTY = "";

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->ACCESS_KEY = "iqUALsGPyTUKSeKv";
    }

    function isEmpty($parameter)
    {
        if( $parameter === self::EMPTY || $parameter === null)
        {
            return true;
        }

        return false;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $consultaToken = Http::get("http://ws.spotgifts.com.br/api/v1/authenticateclient?AccessKey=$this->ACCESS_KEY")->json();
        $token = $consultaToken['Token'];
        $retorno = Http::get("http://ws.spotgifts.com.br/api/v1/stocks?token=$token&lang=PT")->json();

        SkuQuantity::truncate();

        $array_sku_quantity_insert = array();
        foreach ($retorno['Stocks'] as $key => $value) {

            $array_quantity = array();
            $array_quantity['Sku'] = $value['Sku'];
            $array_quantity['Quantity'] = $value['Quantity'];
            $array_quantity['NextQuantity1'] = $this->isEmpty($value['NextQuantity1']) ? self::EMPTY : $value['NextQuantity1'];
            $array_quantity['NextDate1'] = $this->isEmpty($value['NextDate1']) ? self::EMPTY : $value['NextDate1'];
            $array_quantity['NextQuantity2'] = $this->isEmpty($value['NextQuantity2']) ? self::EMPTY : $value['NextQuantity2'];
            $array_quantity['NextDate2'] = $this->isEmpty($value['NextDate2']) ? self::EMPTY : $value['NextDate2'];
            $array_quantity['NextQuantity3'] = $this->isEmpty($value['NextQuantity3']) ? self::EMPTY : $value['NextQuantity3'];
            $array_quantity['NextDate3'] = $this->isEmpty($value['NextDate3']) ? self::EMPTY : $value['NextDate3'];
            $array_quantity['NextQuantity4'] = $this->isEmpty($value['NextQuantity4']) ? self::EMPTY : $value['NextQuantity4'];
            $array_quantity['NextDate4'] = $this->isEmpty($value['NextDate4']) ? self::EMPTY : $value['NextDate4'];
            $array_quantity['NextQuantity5'] = $this->isEmpty($value['NextQuantity5']) ? self::EMPTY : $value['NextQuantity5'];
            $array_quantity['NextDate5'] = $this->isEmpty($value['NextDate5']) ? self::EMPTY : $value['NextDate5'];
            $array_quantity['NextQuantity6'] = $this->isEmpty($value['NextQuantity6']) ? self::EMPTY : $value['NextQuantity6'];
            $array_quantity['NextDate6'] = $this->isEmpty($value['NextDate6']) ? self::EMPTY : $value['NextDate6'];
            $array_quantity['WebSku'] = $this->isEmpty($value['WebSku']) ? self::EMPTY : $value['WebSku'];
            $array_quantity['Country'] = $this->isEmpty($value['Country']) ? self::EMPTY : $value['Country'];

            array_push($array_sku_quantity_insert, $array_quantity);
        }
        
        unset($retorno);
        $avg = count($array_sku_quantity_insert)/2;

        foreach (array_chunk($array_sku_quantity_insert,$avg) as $t)  
        {
            DB::table('sku_quantity_spot')->insert($t);
        }

        unset($array_sku_quantity_insert);

        return ;
    }
}
