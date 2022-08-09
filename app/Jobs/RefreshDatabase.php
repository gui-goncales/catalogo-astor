<?php

namespace App\Jobs;

use App\Models\productOptionalsSpot;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\ProdutoSpot;

class RefreshDatabase implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $ACCESS_KEY;
    protected $TOKEN;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->ACCESS_KEY = "iqUALsGPyTUKSeKv";
        $consultaToken = Http::get("http://ws.spotgifts.com.br/api/v1/authenticateclient?AccessKey=$this->ACCESS_KEY")->json();
        $this->TOKEN = $consultaToken['Token'];
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $retorno = Http::get("http://ws.spotgifts.com.br/api/v1/productsTree?token=$this->TOKEN&lang=PT")->json();

        ProdutoSpot::truncate();
        productOptionalsSpot::truncate();

        $array_full_produtos_insert = array();
        $array_full_options_insert = array();
        foreach ($retorno['ProductsTree'] as $key => $value) {

            $produtos_insert = array();
            $produtos_insert['ProdReference'] = @$value['ProdReference'];
            $produtos_insert['Name'] = @$value['Name'];
            $produtos_insert['Description'] = @$value['Description'];
            $produtos_insert['CombinedSizes'] = @$value['CombinedSizes'];
            $produtos_insert['SubType'] = @$value['SubType'];
            $produtos_insert['MainImage'] = @$value['MainImage'];
            $produtos_insert['Colors'] = strtoupper(@$value['Colors']);
            $produtos_insert['UpdateDate'] = @$value['UpdateDate'];

            array_push($array_full_produtos_insert, $produtos_insert);

            foreach ($value['ProductOptionals'] as $cadaUm2 => $value2) {

                $options_insert = array();
                $options_insert['ProdReference'] = @$value['ProdReference'];
                $options_insert['Sku'] = @$value2['Sku'];
                $options_insert['Size'] = @$value2['Size'];
                $options_insert['ColorDesc1'] = @$value2['ColorDesc1'];
                $options_insert['ColorHex1'] = @$value2['ColorHex1'];
                $options_insert['ColorCode'] = @$value2['ColorCode'];
                $options_insert['WebSku'] = @$value2['WebSku'];
                $options_insert['SizeLengthCM'] = @$value2['SizeLengthCM'];
                $options_insert['SizeWidthCM'] = @$value2['SizeWidthCM'];
                $options_insert['LastSale'] = @$value2['LastSale'];

                array_push($array_full_options_insert, $options_insert);
            }
        }

        DB::table('produto_spot')->insert($array_full_produtos_insert);
        unset($array_full_produtos_insert);
        DB::table('product_optionals_spot')->insert($array_full_options_insert);
        unset($array_full_options_insert);
    }
}
