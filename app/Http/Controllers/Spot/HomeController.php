<?php

namespace App\Http\Controllers\Spot;

use App\Models\ProdutoSpot;
use App\Models\SkuQuantity;
use App\Models\productOptionalsSpot;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{

    protected $acessKey = "iqUALsGPyTUKSeKv";
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
        //Calculo Data Produtos Total
        $ultimoProdutos = DB::table('produto_spot')->latest('ProdReference')->first();

        if (!is_null($ultimoProdutos)) {
            $diffProdutos = Carbon::now()->diffInMinutes($ultimoProdutos->created_at);
        }

        if (@$diffProdutos >= 10080 || is_null($ultimoProdutos)) {

            $consultaToken = Http::get("http://ws.spotgifts.com.br/api/v1/authenticateclient?AccessKey=$this->acessKey")->json();
            $token = $consultaToken['Token'];
            $retorno = Http::get("http://ws.spotgifts.com.br/api/v1/productsTree?token=$token&lang=PT")->json();

            foreach ($retorno['ProductsTree'] as $key => $value) {
                $produtoSpot = new ProdutoSpot;
                $produtoSpot->ProdReference = @$value['ProdReference'];
                $produtoSpot->Name = @$value['Name'];
                $produtoSpot->SEOName = @$value['SEOName'];
                $produtoSpot->Description = @$value['Description'];
                $produtoSpot->ShortDescription = @$value['ShortDescription'];
                $produtoSpot->SEOShortDescription = @$value['SEOShortDescription'];
                $produtoSpot->SEOShortDescriptionCap = @$value['SEOShortDescriptionCap'];
                $produtoSpot->IsTextil = @$value['IsTextil'];
                $produtoSpot->HasColors = @$value['HasColors'];
                $produtoSpot->HasSizes = @$value['HasSizes'];
                $produtoSpot->HasCapacitys = @$value['HasCapacitys'];
                $produtoSpot->CombinedSizes = @$value['CombinedSizes'];
                $produtoSpot->Gender = @$value['Gender'];
                $produtoSpot->DefaultCustomizationIncludedInPrice = @$value['DefaultCustomizationIncludedInPrice'];
                $produtoSpot->AvailableGross = @$value['AvailableGross'];
                $produtoSpot->BoxLengthMM = @$value['BoxLengthMM'];
                $produtoSpot->BoxWidthMM = @$value['BoxWidthMM'];
                $produtoSpot->BoxHeightMM = @$value['BoxHeightMM'];
                $produtoSpot->BoxSizeM = @$value['BoxSizeM'];
                $produtoSpot->BoxWeightKG = @$value['BoxWeightKG'];
                $produtoSpot->BoxVolume = @$value['BoxVolume'];
                $produtoSpot->BoxQuantity = @$value['BoxQuantity'];
                $produtoSpot->BoxInnerQuantity = @$value['BoxInnerQuantity'];
                $produtoSpot->Multiplier = @$value['Multiplier'];
                $produtoSpot->Taric = @$value['Taric'];
                $produtoSpot->Type = @$value['Type'];
                $produtoSpot->TypeCode = @$value['TypeCode'];
                $produtoSpot->Type = @$value['Type'];
                $produtoSpot->TypeCode = @$value['TypeCode'];
                $produtoSpot->MainImage = @$value['MainImage'];
                $produtoSpot->BoxImage = @$value['BoxImage'];
                $produtoSpot->BagImage = @$value['BagImage'];
                $produtoSpot->PouchImage = @$value['PouchImage'];
                $produtoSpot->AditionalImageList = @$value['AditionalImageList'];
                $produtoSpot->AllImageList = @$value['AllImageList'];
                $produtoSpot->Brand = @$value['Brand'];
                $produtoSpot->CountryOfOrigin = @$value['CountryOfOrigin'];
                $produtoSpot->PvcFree = @$value['PvcFree'];
                $produtoSpot->Properties = @$value['Properties'];
                $produtoSpot->ProductCare = @$value['ProductCare'];
                $produtoSpot->Certificates = @$value['Certificates'];
                $produtoSpot->WeightGr = @$value['WeightGr'];
                $produtoSpot->Composition = @$value['Composition'];
                $produtoSpot->Packing = @$value['Packing'];
                $produtoSpot->Weight = @$value['Weight'];
                $produtoSpot->Repacking = @$value['Repacking'];
                $produtoSpot->RefillType = @$value['RefillType'];
                $produtoSpot->BatteryType = @$value['BatteryType'];
                $produtoSpot->Materials = @$value['Materials'];
                $produtoSpot->PaperSize = @$value['PaperSize'];
                $produtoSpot->PaperGramage = @$value['PaperGramage'];
                $produtoSpot->CapacityMah = @$value['CapacityMah'];
                $produtoSpot->CapacityGB = @$value['CapacityGB'];
                $produtoSpot->InkColor = @$value['InkColor'];
                $produtoSpot->OtherDetails = @$value['OtherDetails'];
                $produtoSpot->KeyWords = @$value['KeyWords'];
                $produtoSpot->RelatedReferences = @$value['RelatedReferences'];
                $produtoSpot->Video360 = @$value['Video360'];
                $produtoSpot->VideoLink = @$value['VideoLink'];
                $produtoSpot->VideoLinkVimeo = @$value['VideoLinkVimeo'];
                $produtoSpot->Sizes = @$value['Sizes'];
                $produtoSpot->Capacitys = @$value['Capacitys'];
                $produtoSpot->Colors = strtoupper(@$value['Colors']);
                $produtoSpot->ProductComponents = @$value['ProductComponents'];
                $produtoSpot->ProductDefaultComponent = @$value['ProductDefaultComponent'];
                $produtoSpot->ProductComponentLocations = @$value['ProductComponentLocations'];
                $produtoSpot->ProductComponentDefaultLocation = @$value['ProductComponentDefaultLocation'];
                $produtoSpot->ProductComponentDefaultLocationAreaMM = @$value['ProductComponentDefaultLocationAreaMM'];
                $produtoSpot->ProductComposedLocations = @$value['ProductComposedLocations'];
                $produtoSpot->CustomizationTypes = @$value['CustomizationTypes'];
                $produtoSpot->CustomizationDefaultType = @$value['CustomizationDefaultType'];
                $produtoSpot->CustomizationTables = @$value['CustomizationTables'];
                $produtoSpot->CustomizationDefaultTable = @$value['CustomizationDefaultTable'];
                $produtoSpot->CustomizationTableOptions = @$value['CustomizationTableOptions'];
                $produtoSpot->CustomizationTableOptionsMaxColors = @$value['CustomizationTableOptionsMaxColors'];
                $produtoSpot->CustomizationTableOptionsHandlingCosts = @$value['CustomizationTableOptionsHandlingCosts'];
                $produtoSpot->CustomizationTableOptionsHandlingCostCodes = @$value['CustomizationTableOptionsHandlingCostCodes'];
                $produtoSpot->CustomizationDefault = @$value['CustomizationDefault'];
                $produtoSpot->CustomizationDefaultTableMaxColors = @$value['CustomizationDefaultTableMaxColors'];
                $produtoSpot->CustomizationDefaultHandlingCosts = @$value['CustomizationDefaultHandlingCosts'];
                $produtoSpot->CustomizationDefaultHandlingCostCode = @$value['CustomizationDefaultHandlingCostCode'];
                $produtoSpot->CustomizationDefaultPrintingLines = @$value['CustomizationDefaultPrintingLines'];
                $produtoSpot->IsSeasonal = @$value['IsSeasonal'];
                $produtoSpot->SeasonalOccasion = @$value['SeasonalOccasion'];
                $produtoSpot->SeasonalStartDate = @$value['SeasonalStartDate'];
                $produtoSpot->SeasonalEndDate = @$value['SeasonalEndDate'];
                $produtoSpot->PriceByCapacity = @$value['PriceByCapacity'];
                $produtoSpot->IsStockOut = @$value['IsStockOut'];
                $produtoSpot->OnlineExclusive = @$value['OnlineExclusive'];
                $produtoSpot->NewProduct = @$value['NewProduct'];
                $produtoSpot->YourPrice = @$value['YourPrice'];
                $produtoSpot->CertificateFiles = @$value['CertificateFiles'];
                $produtoSpot->Catalogs = @$value['Catalogs'];
                $produtoSpot->UpdateDate = @$value['UpdateDate'];
                $produtoSpot->save();

                foreach($value['ProductOptionals'] as $cadaUm2 => $value2)
                {
                    $productOptionalsSpot = new productOptionalsSpot;
                    $productOptionalsSpot->ProdReference = @$value['ProdReference'];
                    $productOptionalsSpot->Sku = @$value2['Sku'];
                    $productOptionalsSpot->Size = @$value2['Size'];
                    $productOptionalsSpot->ColorDesc1 = @$value2['ColorDesc1'];
                    $productOptionalsSpot->ColorHex1 = @$value2['ColorHex1'];
                    $productOptionalsSpot->ColorCode = @$value2['ColorCode'];
                    $productOptionalsSpot->WebSku = @$value2['WebSku'];
                    $productOptionalsSpot->SizeLengthCM = @$value2['SizeLengthCM'];
                    $productOptionalsSpot->SizeWidthCM = @$value2['SizeWidthCM'];
                    $productOptionalsSpot->LastSale = @$value2['LastSale'];
                    $productOptionalsSpot->save();
                }

            }
        }

        //Calculo Data Estoque Produtos
        $ultimoEstoque = DB::table('sku_quantity_spot')->latest('Sku')->first();

        if (!is_null($ultimoEstoque)) {
            $diffEstoque = Carbon::now()->diffInMinutes($ultimoEstoque->created_at);
        }

        if (@$diffEstoque >= 15 || is_null($ultimoEstoque)) {

            $consultaToken = Http::get("http://ws.spotgifts.com.br/api/v1/authenticateclient?AccessKey=$this->acessKey")->json();
            $token = $consultaToken['Token'];
            $retorno = Http::get("http://ws.spotgifts.com.br/api/v1/stocks?token=$token&lang=PT")->json();

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

        //GET RESPONSE PRODUCTS
        $response = ProdutoSpot::orderby('Name', 'ASC')->paginate(100);
        $colorsDataBase = ProdutoSpot::select('Colors')->orderByRaw("Colors ASC")->get();
        $brand = ProdutoSpot::select('Brand')->orderByRaw("Brand ASC")->distinct()->get();
        $categoria = ProdutoSpot::select('Type')->distinct()->orderByRaw("Type ASC")->get();
        $tamanhos = ProdutoSpot::select('CombinedSizes')->distinct()->orderByRaw("CombinedSizes ASC")->get();

        //GET COLORS AVAILABLE
        $cores = $this->getColors($colorsDataBase);

        return view('spot.home', compact('response', 'cores', 'brand', 'categoria', 'tamanhos', 'quantidade'));
    }
}
