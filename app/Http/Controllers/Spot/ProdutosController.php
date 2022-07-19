<?php

namespace App\Http\Controllers\Spot;

use App\Http\Controllers\Controller;
use App\Models\ProdutoSpot;
use App\Models\SkuQuantity;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function consultaBanco(Request $request)
    {

        $response = ProdutoSpot::where('Name', 'LIKE', '%'.$request->nome.'%')
                    ->where('ProdReference', 'LIKE', '%'.$request->codigo.'%')
                    ->where('Colors', 'LIKE', '%'.$request->cor.'%')
                    ->where('Brand', 'LIKE', '%'.$request->brand.'%')
                    ->where('Type', 'LIKE', '%'.$request->categoria.'%')
                    ->where('CombinedSizes', 'LIKE', '%'.$request->tamanho.'%')
                    ->paginate(100)->appends(request()->query());
                    
        //GET COLORS AVAILABLE
        $colorsDataBase = ProdutoSpot::select('Colors')->orderByRaw("Colors ASC")->get();
        $cores = $this->getColors($colorsDataBase);
        $brand = ProdutoSpot::select('Brand')->orderByRaw("Brand ASC")->distinct()->get();
        $categoria = ProdutoSpot::select('Type')->distinct()->orderByRaw("Type ASC")->get();
        $tamanhos = ProdutoSpot::select('CombinedSizes')->distinct()->orderByRaw("CombinedSizes ASC")->get();

        return view('spot.home', compact('response', 'cores', 'brand', 'categoria', 'tamanhos'));

    }

    function viewProduct(Request $request, $ProdReference){
        
        $response = ProdutoSpot::where('ProdReference', '=', $ProdReference)->get();

        return view('spot.view', compact('response'));

    }

    public function orderCodigo(Request $request)
    {

        switch ($request->parameter) {

            case 'up':
                $response = ProdutoSpot::where('Name', 'LIKE', '%'.$request->nome.'%')
                ->where('ProdReference', 'LIKE', '%'.$request->codigo.'%')
                ->where('Colors', 'LIKE', '%'.$request->cor.'%')
                ->where('Brand', 'LIKE', '%'.$request->brand.'%')
                ->where('Type', 'LIKE', '%'.$request->categoria.'%')
                ->where('CombinedSizes', 'LIKE', '%'.$request->tamanho.'%')
                ->orderByRaw("ProdReference ASC")
                ->paginate(100)->appends(request()->query());
                $codigoFiltragem = TRUE;
                break;

            case 'down':
                $response = ProdutoSpot::where('Name', 'LIKE', '%'.$request->nome.'%')
                ->where('ProdReference', 'LIKE', '%'.$request->codigo.'%')
                ->where('Colors', 'LIKE', '%'.$request->cor.'%')
                ->where('Brand', 'LIKE', '%'.$request->brand.'%')
                ->where('Type', 'LIKE', '%'.$request->categoria.'%')
                ->where('CombinedSizes', 'LIKE', '%'.$request->tamanho.'%')
                ->orderByRaw("ProdReference DESC")
                ->paginate(100)->appends(request()->query());
                $codigoFiltragem = FALSE;
                break;
        }
                    
        //GET COLORS AVAILABLE
        $colorsDataBase = ProdutoSpot::select('Colors')->orderByRaw("Colors ASC")->get();
        $cores = $this->getColors($colorsDataBase);
        $brand = ProdutoSpot::select('Brand')->orderByRaw("Brand ASC")->distinct()->get();
        $categoria = ProdutoSpot::select('Type')->distinct()->orderByRaw("Type ASC")->get();
        $tamanhos = ProdutoSpot::select('CombinedSizes')->distinct()->orderByRaw("CombinedSizes ASC")->get();

        return view('spot.home', compact('response', 'cores', 'brand', 'categoria', 'tamanhos', 'codigoFiltragem'));
    }

    public function orderNome(Request $request)
    {

        switch ($request->parameter) {

            case 'up':
                $response = ProdutoSpot::where('Name', 'LIKE', '%'.$request->nome.'%')
                ->where('ProdReference', 'LIKE', '%'.$request->codigo.'%')
                ->where('Colors', 'LIKE', '%'.$request->cor.'%')
                ->where('Brand', 'LIKE', '%'.$request->brand.'%')
                ->where('Type', 'LIKE', '%'.$request->categoria.'%')
                ->where('CombinedSizes', 'LIKE', '%'.$request->tamanho.'%')
                ->orderByRaw("Name ASC")
                ->paginate(100)->appends(request()->query());
                $nomeFiltragem = TRUE;
                break;

            case 'down':
                $response = ProdutoSpot::where('Name', 'LIKE', '%'.$request->nome.'%')
                ->where('ProdReference', 'LIKE', '%'.$request->codigo.'%')
                ->where('Colors', 'LIKE', '%'.$request->cor.'%')
                ->where('Brand', 'LIKE', '%'.$request->brand.'%')
                ->where('Type', 'LIKE', '%'.$request->categoria.'%')
                ->where('CombinedSizes', 'LIKE', '%'.$request->tamanho.'%')
                ->orderByRaw("Name DESC")
                ->paginate(100)->appends(request()->query());
                $nomeFiltragem = FALSE;
                break;
        }
                    
        //GET COLORS AVAILABLE
        $colorsDataBase = ProdutoSpot::select('Colors')->orderByRaw("Colors ASC")->get();
        $cores = $this->getColors($colorsDataBase);
        $brand = ProdutoSpot::select('Brand')->orderByRaw("Brand ASC")->distinct()->get();
        $categoria = ProdutoSpot::select('Type')->distinct()->orderByRaw("Type ASC")->get();
        $tamanhos = ProdutoSpot::select('CombinedSizes')->distinct()->orderByRaw("CombinedSizes ASC")->get();

        return view('spot.home', compact('response', 'cores', 'brand', 'categoria', 'tamanhos', 'nomeFiltragem'));
    }

    public function orderCategoria(Request $request)
    {

        switch ($request->parameter) {

            case 'up':
                $response = ProdutoSpot::where('Name', 'LIKE', '%'.$request->nome.'%')
                ->where('ProdReference', 'LIKE', '%'.$request->codigo.'%')
                ->where('Colors', 'LIKE', '%'.$request->cor.'%')
                ->where('Brand', 'LIKE', '%'.$request->brand.'%')
                ->where('Type', 'LIKE', '%'.$request->categoria.'%')
                ->where('CombinedSizes', 'LIKE', '%'.$request->tamanho.'%')
                ->orderByRaw("Type ASC")
                ->paginate(100)->appends(request()->query());
                $categoriaFiltragem = TRUE;
                break;

            case 'down':
                $response = ProdutoSpot::where('Name', 'LIKE', '%'.$request->nome.'%')
                ->where('ProdReference', 'LIKE', '%'.$request->codigo.'%')
                ->where('Colors', 'LIKE', '%'.$request->cor.'%')
                ->where('Brand', 'LIKE', '%'.$request->brand.'%')
                ->where('Type', 'LIKE', '%'.$request->categoria.'%')
                ->where('CombinedSizes', 'LIKE', '%'.$request->tamanho.'%')
                ->orderByRaw("Type DESC")
                ->paginate(100)->appends(request()->query());
                $categoriaFiltragem = FALSE;
                break;
        }
                    
        //GET COLORS AVAILABLE
        $colorsDataBase = ProdutoSpot::select('Colors')->orderByRaw("Colors ASC")->get();
        $cores = $this->getColors($colorsDataBase);
        $brand = ProdutoSpot::select('Brand')->orderByRaw("Brand ASC")->distinct()->get();
        $categoria = ProdutoSpot::select('Type')->distinct()->orderByRaw("Type ASC")->get();
        $tamanhos = ProdutoSpot::select('CombinedSizes')->distinct()->orderByRaw("CombinedSizes ASC")->get();

        return view('spot.home', compact('response', 'cores', 'brand', 'categoria', 'tamanhos', 'categoriaFiltragem'));
    }

    public function orderMarca(Request $request)
    {

        switch ($request->parameter) {

            case 'up':
                $response = ProdutoSpot::where('Name', 'LIKE', '%'.$request->nome.'%')
                ->where('ProdReference', 'LIKE', '%'.$request->codigo.'%')
                ->where('Colors', 'LIKE', '%'.$request->cor.'%')
                ->where('Brand', 'LIKE', '%'.$request->brand.'%')
                ->where('Type', 'LIKE', '%'.$request->categoria.'%')
                ->where('CombinedSizes', 'LIKE', '%'.$request->tamanho.'%')
                ->orderByRaw("Brand ASC")
                ->paginate(100)->appends(request()->query());
                $marcaFiltragem = TRUE;
                break;

            case 'down':
                $response = ProdutoSpot::where('Name', 'LIKE', '%'.$request->nome.'%')
                ->where('ProdReference', 'LIKE', '%'.$request->codigo.'%')
                ->where('Colors', 'LIKE', '%'.$request->cor.'%')
                ->where('Brand', 'LIKE', '%'.$request->brand.'%')
                ->where('Type', 'LIKE', '%'.$request->categoria.'%')
                ->where('CombinedSizes', 'LIKE', '%'.$request->tamanho.'%')
                ->orderByRaw("Brand DESC")
                ->paginate(100)->appends(request()->query());
                $marcaFiltragem = FALSE;
                break;
        }
                    
        //GET COLORS AVAILABLE
        $colorsDataBase = ProdutoSpot::select('Colors')->orderByRaw("Colors ASC")->get();
        $cores = $this->getColors($colorsDataBase);
        $brand = ProdutoSpot::select('Brand')->orderByRaw("Brand ASC")->distinct()->get();
        $categoria = ProdutoSpot::select('Type')->distinct()->orderByRaw("Type ASC")->get();
        $tamanhos = ProdutoSpot::select('CombinedSizes')->distinct()->orderByRaw("CombinedSizes ASC")->get();

        return view('spot.home', compact('response', 'cores', 'brand', 'categoria', 'tamanhos', 'marcaFiltragem'));
    }
}
