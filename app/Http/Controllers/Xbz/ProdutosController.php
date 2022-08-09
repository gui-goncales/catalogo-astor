<?php

namespace App\Http\Controllers\Xbz;
use App\Http\Controllers\Controller;
use App\Models\Produtos;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{

    public function consultaBanco(Request $request)
    {

        $response = Produtos::where('Nome', 'LIKE', '%'.$request->nome.'%')
                    ->where('CodigoComposto', 'LIKE', '%'.$request->codigo.'%')
                    ->where('CorWebPrincipal', 'LIKE', '%'.$request->cor.'%')
                    ->orderBy("PrecoVenda", $request->preco)
                    ->paginate(100)->appends(request()->query());
                    
        $cores = Produtos::distinct()->get(['CorWebPrincipal', 'CorWebPrincipalId']);

        return view('xbz.home', compact('response', 'cores'));

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

        $response = $this->sqlOrderExecXbz('CodigoComposto', $upOrDown, $request);
                    
        $cores = Produtos::distinct()->get(['CorWebPrincipal', 'CorWebPrincipalId']);

        return view('xbz.home', compact('response', 'cores', 'codigoFiltragem'));

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

        $response = $this->sqlOrderExecXbz('Nome', $upOrDown, $request);

        $cores = Produtos::distinct()->get(['CorWebPrincipal', 'CorWebPrincipalId']);

        return view('xbz.home', compact('response', 'cores', 'nomeFiltragem'));

    }

    public function orderCor(Request $request)
    {

        switch ($request->parameter) {
            case 'up':
                $upOrDown = "ASC";
                $corFiltragem = TRUE;
                break;

            case 'down':
                $upOrDown = "DESC";
                $corFiltragem = FALSE;
                break;
        }

        $response = $this->sqlOrderExecXbz('CorWebPrincipal', $upOrDown, $request);

        $cores = Produtos::distinct()->get(['CorWebPrincipal', 'CorWebPrincipalId']);

        return view('xbz.home', compact('response', 'cores', 'corFiltragem'));

    }

    public function orderStatus(Request $request)
    {

        switch ($request->parameter) {
            case 'up':
                $upOrDown = "ASC";
                $statusFiltragrem = TRUE;
                break;

            case 'down':
                $upOrDown = "DESC";
                $statusFiltragrem = FALSE;
                break;
        }

        $response = $this->sqlOrderExecXbz('IdStatusConfiabilidade', $upOrDown, $request);

        $cores = Produtos::distinct()->get(['CorWebPrincipal', 'CorWebPrincipalId']);

        return view('xbz.home', compact('response', 'cores', 'statusFiltragrem'));

    }

}
