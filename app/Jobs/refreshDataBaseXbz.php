<?php

namespace App\Jobs;

use App\Models\Produtos;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class RefreshDataBaseXbz implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $response = Http::get('https://api.minhaxbz.com.br:5001/api/clientes/GetListaDeProdutos?cnpj=11728594000178&token=4C8EC5A014')->json();

        Produtos::truncate();

        $array_full_insert = array();
        foreach ($response as $key => $value) {
            $array_insert = array();
            $array_insert['CodigoComposto'] = $value['CodigoComposto'];
            $array_insert['Nome'] = $value['Nome'];
            $array_insert['ImageLink'] = $value['ImageLink'];
            $array_insert['CorWebPrincipalId'] = $value['CorWebPrincipalId'];
            $array_insert['CorWebPrincipal'] = preg_replace('/[^A-Za-z0-9\-]/', ' ', $value['CorWebPrincipal']);
            $array_insert['IdStatusConfiabilidade'] = $value['IdStatusConfiabilidade'];
            $array_insert['PrecoVenda'] = $value['PrecoVenda'];
            $array_insert['QuantidadeDisponivel'] = $value['QuantidadeDisponivel'];
            $array_insert['Ncm'] = $value['Ncm'];
            array_push($array_full_insert, $array_insert);
        }

        DB::table('produtos')->insert($array_full_insert);

        return ;
    }
}
