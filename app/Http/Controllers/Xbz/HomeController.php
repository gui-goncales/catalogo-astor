<?php

namespace App\Http\Controllers\Xbz;
use App\Http\Controllers\Controller;
use App\Models\Produtos;
use App\Http\Controllers\RoutineXbz;


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
        RoutineXbz::needUpdate();
        $response = Produtos::orderBy('Nome', 'ASC')->paginate(100);
        $cores = Produtos::distinct()->get(['CorWebPrincipal', 'CorWebPrincipalId']);

        return view('xbz.home', compact('response', 'cores'));
           
    }
}
