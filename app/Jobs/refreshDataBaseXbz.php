<?php

namespace App\Jobs;

use App\Models\Produtos;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class refreshDataBaseXbz implements ShouldQueue
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

        foreach ($response as $key => $value) {

                $produtos = new Produtos;
                // $produtos->IdPessoa = $value['IdPessoa'];
                // $produtos->IdProduto = $value['IdProduto'];
                // $produtos->CodigoXbz = $value['CodigoXbz'];
                $produtos->CodigoComposto = $value['CodigoComposto'];
                // $produtos->CodigoAmigavel = $value['CodigoAmigavel'];
                $produtos->Nome = $value['Nome'];
                // $produtos->SiteLink = $value['SiteLink'];
                $produtos->ImageLink = $value['ImageLink'];
                // $produtos->WebTipoId = $value['WebTipoId'];
                // $produtos->WebTipo = $value['WebTipo'];
                // $produtos->WebSubTipoId = $value['WebSubTipoId'];
                // $produtos->WebSubTipo = $value['WebSubTipo'];
                $produtos->CorWebPrincipalId = $value['CorWebPrincipalId'];
                $produtos->CorWebPrincipal = preg_replace('/[^A-Za-z0-9\-]/', ' ', $value['CorWebPrincipal']);
                // $produtos->CorWebSecundariaId = $value['CorWebSecundariaId'];
                // $produtos->CorWebSecundaria = preg_replace('/[^A-Za-z0-9\-]/', ' ', $value['CorWebSecundaria']);
                $produtos->IdStatusConfiabilidade = $value['IdStatusConfiabilidade'];

                // $produtos->Peso = $value['Peso'];
                // $produtos->Altura = $value['Altura'];
                // $produtos->Largura = $value['Largura'];
                // $produtos->Profundidade = $value['Profundidade'];
                $produtos->PrecoVenda = $value['PrecoVenda'];

                // $produtos->PontaDeEstoque = $value['PontaDeEstoque'];
                $produtos->QuantidadeDisponivel = $value['QuantidadeDisponivel'];
                $produtos->Ncm = $value['Ncm'];
                $produtos->save();
        }
    }
}
