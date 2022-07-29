<?php

namespace App\Http\Controllers;

use App\Models\Produtos;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use App\Models\SkuQuantity;
use  App\Models\ProdutoSpot;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getColors($colorsDataBase)
    {
        //GET COLORS AVAILABLE
        $colorsArray = array();
        foreach ($colorsDataBase as $cadaum => $value) {
            $exploded = explode(",", $value->Colors);

            foreach ($exploded as $cadaum2 => $value2) {

                if (!empty($colorsArray)) {
                    $key = array_search(strtoupper(trim($value2)), $colorsArray);
                    if ($key === false) {
                        $colorsArray[] = strtoupper(trim($value2));
                    }
                } else {
                    $colorsArray[] = strtoupper(trim($value2));
                }
            }
        }

        return $colorsArray;
    }

    public function getSkus()
    {
        $result = DB::table('product_optionals_spot')->orderBy('product_optionals_spot.ProdReference', 'ASC')->get();

        $array = array();
        foreach($result as $cadaUm => $value)
        {   
            $result = SkuQuantity::Where('Sku', '=', $value->Sku)->limit(1)->get();

            $array[$value->ProdReference][$value->Sku]['Quantity'    ] = $result[0]->Quantity;
            $array[$value->ProdReference][$value->Sku]['Size'        ] = $value->Size;
            $array[$value->ProdReference][$value->Sku]['ColorDesc'   ] = $value->ColorDesc1;
            $array[$value->ProdReference][$value->Sku]['ColorHex'    ] = $value->ColorHex1;
            $array[$value->ProdReference][$value->Sku]['NextQuantity'] = $result[0]->NextQuantity1;
            $array[$value->ProdReference][$value->Sku]['NextDate'    ] = $result[0]->NextDate1;
        }
        return $array;
    }

    public function sqlOrderExecXbz($ordem, $upOrDown, $request)
    {
        return  Produtos::where('Nome', 'LIKE', '%'.$request->nome.'%')
                ->where('CodigoComposto', 'LIKE', '%'.$request->codigo.'%')
                ->where('CorWebPrincipal', 'LIKE', '%'.$request->cor.'%')
                ->orderByRaw("$ordem $upOrDown")
                ->paginate(100)->appends(request()->query());
    }

    public function sqlOrderExecSpot($ordem, $upOrDown, $request)
    {
        return ProdutoSpot::where('Name', 'LIKE', '%'.$request->nome.'%')
                ->where('ProdReference', 'LIKE', '%'.$request->codigo.'%')
                ->where('Colors', 'LIKE', '%'.$request->cor.'%')
                ->where('Brand', 'LIKE', '%'.$request->brand.'%')
                ->where('Type', 'LIKE', '%'.$request->categoria.'%')
                ->where('CombinedSizes', 'LIKE', '%'.$request->tamanho.'%')
                ->orderByRaw("$ordem $upOrDown")
                ->paginate(100)->appends(request()->query());
    }
}
