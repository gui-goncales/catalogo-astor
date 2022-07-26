<?php

namespace App\Http\Controllers\Spot;

use App\Http\Controllers\Controller;
use App\Models\ProdutoSpot;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{

    protected $colorsDataBase = "";
    protected $cores = "";
    protected $categoria = "";
    protected $tamanhos = "";
    protected $skus = "";

    public function setFilter()
    {
        $this->colorsDataBase = ProdutoSpot::select('Colors')->orderByRaw("Colors ASC")->get();
        $this->cores = $this->getColors($this->colorsDataBase);
        $this->categoria = ProdutoSpot::select('SubType')->distinct()->orderByRaw("SubType ASC")->get();
        $this->tamanhos = ProdutoSpot::select('CombinedSizes')->distinct()->orderByRaw("CombinedSizes ASC")->get();
        $this->skus = $this->getSkus();
    }
    
    public function consultaBanco(Request $request)
    {
        $response = ProdutoSpot::where('Name', 'LIKE', '%'.$request->nome.'%')
                    ->where('ProdReference', 'LIKE', '%'.$request->codigo.'%')
                    ->where('Colors', 'LIKE', '%'.$request->cor.'%')
                    ->where('SubType', 'LIKE', '%'.$request->categoria.'%')
                    ->where('CombinedSizes', 'LIKE', '%'.$request->tamanho.'%')
                    ->paginate(100)->appends(request()->query());
                    
         //GET COLORS AVAILABLE
        $this->setFilter();
        $colorsDataBase = $this->colorsDataBase;
        $cores = $this->cores;
        $categoria = $this->categoria;
        $tamanhos = $this->tamanhos;
        $skus = $this->skus;

        return view('spot.home', compact('response', 'cores', 'categoria', 'tamanhos', 'skus'));
    }

    public function orderCodigo(Request $request)
    {

        switch ($request->parameter) {

            case 'up':
                $upOrDown = "ASC";
                $codigoFiltragem = TRUE;
                break;

            case 'down':
                $upOrDown = "DESC";
                $codigoFiltragem = FALSE;
                break;
        }

        $response = Controller::sqlOrderExecSpot("ProdReference", $upOrDown, $request);
                    
        //GET COLORS AVAILABLE
        $this->setFilter();
        $colorsDataBase = $this->colorsDataBase;
        $cores = $this->cores;
        $categoria = $this->categoria;
        $tamanhos = $this->tamanhos;
        $skus = $this->skus;

        return view('spot.home', compact('response', 'cores', 'categoria', 'tamanhos', 'codigoFiltragem', 'skus'));
    }

    public function orderNome(Request $request)
    {

        switch ($request->parameter) {

            case 'up':
                $upOrDown = "ASC";
                $nomeFiltragem = TRUE;
                break;

            case 'down':
                $upOrDown = "DESC";
                $nomeFiltragem = FALSE;
                break;
        }

        $response = Controller::sqlOrderExecSpot("Name", $upOrDown, $request);
                    
        //GET COLORS AVAILABLE
        $this->setFilter();
        $colorsDataBase = $this->colorsDataBase;
        $cores = $this->cores;
        $categoria = $this->categoria;
        $tamanhos = $this->tamanhos;
        $skus = $this->skus;

        return view('spot.home', compact('response', 'cores', 'categoria', 'tamanhos', 'nomeFiltragem', 'skus'));
    }

    public function orderCategoria(Request $request)
    {

        switch ($request->parameter) {

            case 'up':
                $upOrDown = "ASC";
                $categoriaFiltragem = TRUE;
                break;

            case 'down':
                $upOrDown = "DESC";
                $categoriaFiltragem = FALSE;
                break;
        }

        $response = Controller::sqlOrderExecSpot("SubType", $upOrDown, $request);
                    
        //GET COLORS AVAILABLE
        $this->setFilter();
        $colorsDataBase = $this->colorsDataBase;
        $cores = $this->cores;
        $categoria = $this->categoria;
        $tamanhos = $this->tamanhos;
        $skus = $this->skus;

        return view('spot.home', compact('response', 'cores', 'categoria', 'tamanhos', 'categoriaFiltragem', 'skus'));
    }

    public function orderMarca(Request $request)
    {

        switch ($request->parameter) {

            case 'up':
                $upOrDown = "ASC";
                $marcaFiltragem = TRUE;
                break;

            case 'down':
                $upOrDown = "DESC";
                $marcaFiltragem = FALSE;
                break;
        }

        $response = Controller::sqlOrderExecSpot("Brand", $upOrDown, $request);
                    
        //GET COLORS AVAILABLE
        $this->setFilter();
        $colorsDataBase = $this->colorsDataBase;
        $cores = $this->cores;
        $categoria = $this->categoria;
        $tamanhos = $this->tamanhos;
        $skus = $this->skus;

        return view('spot.home', compact('response', 'cores', 'categoria', 'tamanhos', 'marcaFiltragem', 'skus'));
    }
}
