<?php

namespace App\Http\Controllers\Xbz;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use App\Models\Produtos;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //Calculo Data
        $ultimo = DB::table('produtos')->latest('CodigoComposto')->first();

        if(!is_null($ultimo))
        {
            $diff = Carbon::now()->diffInMinutes($ultimo->created_at);
        }
        
        if(@$diff >= 60 || is_null($ultimo))
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

            $response = Produtos::orderBy('Nome', 'ASC')->paginate(100);
            $cores = Produtos::distinct()->get(['CorWebPrincipal', 'CorWebPrincipalId']);

            return view('xbz.home', compact('response', 'cores'));

        }else{

            $response = Produtos::orderBy('Nome', 'ASC')->paginate(100);
            $cores = Produtos::distinct()->get(['CorWebPrincipal', 'CorWebPrincipalId']);

            return view('xbz.home', compact('response', 'cores'));
           
        }
    }
}
