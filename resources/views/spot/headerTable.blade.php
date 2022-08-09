<th scope="col" class="col-table" style="width:10%">
    Imagem
</th>
<th scope="col" class="col-table" style="width:10%">
    @if (!isset($codigoFiltragem) || $codigoFiltragem == 1)
        <form method="GET" action="{{ route('orderCodigoSpot') }}">
            <input type="hidden" name="parameter" value="down">
            <input type="hidden" name="nome" value="{{ @$_GET['nome'] }}">
            <input type="hidden" name="codigo" value="{{ @$_GET['codigo'] }}">
            <input type="hidden" name="quantidade" value="{{ @$_GET['quantidade'] }}">
            <input type="hidden" name="cor" value="{{ @$_GET['cor'] }}">
            <button id="codigoDown" class="none_style">Código<span class="material-icons">expand_more</span></button>
        </form>
    @else
        <form method="GET" action="{{ route('orderCodigoSpot') }}">
            <input type="hidden" name="parameter" value="up">
            <input type="hidden" name="nome" value="{{ @$_GET['nome'] }}">
            <input type="hidden" name="codigo" value="{{ @$_GET['codigo'] }}">
            <input type="hidden" name="quantidade" value="{{ @$_GET['quantidade'] }}">
            <input type="hidden" name="cor" value="{{ @$_GET['cor'] }}">
            <button id="codigoUp" class="none_style">Código<span class="material-icons">expand_less</span></button>
        </form>
    @endif
</th>
<th scope="col" class="col-table" style="width:10%">
    @if (!isset($nomeFiltragem) || $nomeFiltragem == 1)
        <form method="GET" action="{{ route('orderNomeSpot') }}">
            <input type="hidden" name="parameter" value="down">
            <input type="hidden" name="nome" value="{{ @$_GET['nome'] }}">
            <input type="hidden" name="codigo" value="{{ @$_GET['codigo'] }}">
            <input type="hidden" name="quantidade" value="{{ @$_GET['quantidade'] }}">
            <input type="hidden" name="cor" value="{{ @$_GET['cor'] }}">
            <button id="codigoDown" class="none_style">Nome<span class="material-icons">expand_more</span></button>
        </form>
    @else
        <form method="GET" action="{{ route('orderNomeSpot') }}">
            <input type="hidden" name="parameter" value="up">
            <input type="hidden" name="nome" value="{{ @$_GET['nome'] }}">
            <input type="hidden" name="codigo" value="{{ @$_GET['codigo'] }}">
            <input type="hidden" name="quantidade" value="{{ @$_GET['quantidade'] }}">
            <input type="hidden" name="cor" value="{{ @$_GET['cor'] }}">
            <button id="codigoUp" class="none_style">Nome<span class="material-icons">expand_less</span></button>
        </form>
    @endif
</th>
<th>&nbsp;</th>
<th>&nbsp;</th>
<th scope="col" class="col-table" style="width:10%">
    @if (!isset($categoriaFiltragem) || $categoriaFiltragem == 1)
        <form method="GET" action="{{ route('orderCategoriaSpot') }}">
            <input type="hidden" name="parameter" value="down">
            <input type="hidden" name="nome" value="{{ @$_GET['nome'] }}">
            <input type="hidden" name="codigo" value="{{ @$_GET['codigo'] }}">
            <input type="hidden" name="quantidade" value="{{ @$_GET['quantidade'] }}">
            <input type="hidden" name="cor" value="{{ @$_GET['cor'] }}">
            <button id="codigoDown" class="none_style">Categoria<span
                    class="material-icons">expand_more</span></button>
        </form>
    @else
        <form method="GET" action="{{ route('orderCategoriaSpot') }}">
            <input type="hidden" name="parameter" value="up">
            <input type="hidden" name="nome" value="{{ @$_GET['nome'] }}">
            <input type="hidden" name="codigo" value="{{ @$_GET['codigo'] }}">
            <input type="hidden" name="quantidade" value="{{ @$_GET['quantidade'] }}">
            <input type="hidden" name="cor" value="{{ @$_GET['cor'] }}">
            <button id="codigoUp" class="none_style">Categoria<span
                    class="material-icons">expand_less</span></button>
        </form>
    @endif
</th>
<th>&nbsp;</th>
