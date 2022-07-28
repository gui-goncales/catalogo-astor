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

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->ACCESS_KEY = "iqUALsGPyTUKSeKv";
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

        foreach ($retorno['Stocks'] as $key => $value) {

            $SkuQuantity = new SkuQuantity;
            $SkuQuantity->Sku = $value['Sku'];
            $SkuQuantity->Quantity = $value['Quantity'];
            $SkuQuantity->NextQuantity1 = $value['NextQuantity1'];
            $SkuQuantity->NextDate1 = $value['NextDate1'];
            $SkuQuantity->NextQuantity2 = $value['NextQuantity2'];
            $SkuQuantity->NextDate2 = $value['NextDate2'];
            $SkuQuantity->NextQuantity3 = $value['NextQuantity3'];
            $SkuQuantity->NextDate3 = $value['NextDate3'];
            $SkuQuantity->NextQuantity4 = $value['NextQuantity4'];
            $SkuQuantity->NextDate4 = $value['NextDate4'];
            $SkuQuantity->NextQuantity5 = $value['NextQuantity5'];
            $SkuQuantity->NextDate5 = $value['NextDate5'];
            $SkuQuantity->NextQuantity6 = $value['NextQuantity6'];
            $SkuQuantity->NextDate6 = $value['NextDate6'];
            $SkuQuantity->WebSku = $value['WebSku'];
            $SkuQuantity->Country = $value['Country'];

            $SkuQuantity->save();
        }
    }
}
