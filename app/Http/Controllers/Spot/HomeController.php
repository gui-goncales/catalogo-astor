<?php

namespace App\Http\Controllers\Spot;

use App\Models\ProdutoSpot;
use App\Http\Controllers\Controller;


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
        //GET RESPONSE PRODUCTS
        $response = ProdutoSpot::orderby('Name', 'ASC')->paginate(100);
        $colorsDataBase = ProdutoSpot::select('Colors')->orderByRaw("Colors ASC")->get();
        $brand = ProdutoSpot::select('Brand')->orderByRaw("Brand ASC")->distinct()->get();
        $categoria = ProdutoSpot::select('Type')->distinct()->orderByRaw("Type ASC")->get();
        $tamanhos = ProdutoSpot::select('CombinedSizes')->distinct()->orderByRaw("CombinedSizes ASC")->get();

        //GET COLORS AVAILABLE
        $cores = $this->getColors($colorsDataBase);

        $skus = $this->getSkus();

        return view('spot.home', compact('response', 'cores', 'brand', 'categoria', 'tamanhos', 'skus'));
    }
}
