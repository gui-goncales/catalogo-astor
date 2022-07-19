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
                $response = Produtos::where('Nome', 'LIKE', '%'.$request->nome.'%')
                ->where('CodigoComposto', 'LIKE', '%'.$request->codigo.'%')
                ->where('CorWebPrincipal', 'LIKE', '%'.$request->cor.'%')
                ->orderByRaw("CodigoComposto ASC")
                ->paginate(100)->appends(request()->query());
                $codigoFiltragem = TRUE;
                break;

            case 'down':
                $response = Produtos::where('Nome', 'LIKE', '%'.$request->nome.'%')
                ->where('CodigoComposto', 'LIKE', '%'.$request->codigo.'%')
                ->where('CorWebPrincipal', 'LIKE', '%'.$request->cor.'%')
                ->orderByRaw("CodigoComposto DESC")
                ->paginate(100)->appends(request()->query());
                $codigoFiltragem = FALSE;
                break;
        }
                    
        $cores = Produtos::distinct()->get(['CorWebPrincipal', 'CorWebPrincipalId']);

        return view('xbz.home', compact('response', 'cores', 'codigoFiltragem'));

    }

    public function orderNome(Request $request)
    {

        switch ($request->parameter) {
            case 'up':
                $response = Produtos::where('Nome', 'LIKE', '%'.$request->nome.'%')
                ->where('CodigoComposto', 'LIKE', '%'.$request->codigo.'%')
                ->where('CorWebPrincipal', 'LIKE', '%'.$request->cor.'%')
                ->orderByRaw("Nome ASC")
                ->paginate(100)->appends(request()->query());
                $nomeFiltragem = TRUE;
                break;

            case 'down':
                $response = Produtos::where('Nome', 'LIKE', '%'.$request->nome.'%')
                ->where('CodigoComposto', 'LIKE', '%'.$request->codigo.'%')
                ->where('CorWebPrincipal', 'LIKE', '%'.$request->cor.'%')
                ->orderByRaw("Nome DESC")
                ->paginate(100)->appends(request()->query());
                $nomeFiltragem = FALSE;
                break;
        }

        $cores = Produtos::distinct()->get(['CorWebPrincipal', 'CorWebPrincipalId']);

        return view('xbz.home', compact('response', 'cores', 'nomeFiltragem'));

    }

    public function orderCor(Request $request)
    {

        switch ($request->parameter) {
            case 'up':
                $response = Produtos::where('Nome', 'LIKE', '%'.$request->nome.'%')
                ->where('CodigoComposto', 'LIKE', '%'.$request->codigo.'%')
                ->where('CorWebPrincipal', 'LIKE', '%'.$request->cor.'%')
                ->orderByRaw("CorWebPrincipal ASC")
                ->paginate(100)->appends(request()->query());
                $corFiltragem = TRUE;
                break;

            case 'down':
                $response = Produtos::where('Nome', 'LIKE', '%'.$request->nome.'%')
                ->where('CodigoComposto', 'LIKE', '%'.$request->codigo.'%')
                ->where('CorWebPrincipal', 'LIKE', '%'.$request->cor.'%')
                ->orderByRaw("CorWebPrincipal DESC")
                ->paginate(100)->appends(request()->query());
                $corFiltragem = FALSE;
                break;
        }

        $cores = Produtos::distinct()->get(['CorWebPrincipal', 'CorWebPrincipalId']);

        return view('xbz.home', compact('response', 'cores', 'corFiltragem'));

    }

    public function orderStatus(Request $request)
    {

        switch ($request->parameter) {
            case 'up':
                $response = Produtos::where('Nome', 'LIKE', '%'.$request->nome.'%')
                ->where('CodigoComposto', 'LIKE', '%'.$request->codigo.'%')
                ->where('CorWebPrincipal', 'LIKE', '%'.$request->cor.'%')
                ->orderByRaw("IdStatusConfiabilidade ASC")
                ->paginate(100)->appends(request()->query());
                $statusFiltragrem = TRUE;
                break;

            case 'down':
                $response = Produtos::where('Nome', 'LIKE', '%'.$request->nome.'%')
                ->where('CodigoComposto', 'LIKE', '%'.$request->codigo.'%')
                ->where('CorWebPrincipal', 'LIKE', '%'.$request->cor.'%')
                ->orderByRaw("IdStatusConfiabilidade DESC")
                ->paginate(100)->appends(request()->query());
                $statusFiltragrem = FALSE;
                break;
        }

        $cores = Produtos::distinct()->get(['CorWebPrincipal', 'CorWebPrincipalId']);

        return view('xbz.home', compact('response', 'cores', 'statusFiltragrem'));

    }

}
