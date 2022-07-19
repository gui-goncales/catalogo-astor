@extends('layouts.app')

@section('content')
{{-- @dd($response) --}}
    @include('spot.filtros')
    <div class="conteudo col-12 shadow-sm" style="width: 100%; overflow-x: auto;">
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" class="col-table" style="width:10%">
                            @if(!isset($codigoFiltragem) || $codigoFiltragem == 1)
                            <form method="GET" action="{{route('orderCodigoSpot')}}">
                              <input type="hidden" name="parameter" value="down">
                              <input type="hidden" name="nome" value="{{@$_GET['nome']}}">
                              <input type="hidden" name="codigo" value="{{@$_GET['codigo']}}">
                              <input type="hidden" name="quantidade" value="{{@$_GET['quantidade']}}">
                              <input type="hidden" name="cor" value="{{@$_GET['cor']}}">
                              <button id="codigoDown" class="none_style">Código<span class="material-icons">expand_more</span></button>
                            </form>
                            @else
                            <form method="GET" action="{{route('orderCodigoSpot')}}">
                              <input type="hidden" name="parameter" value="up">
                              <input type="hidden" name="nome" value="{{@$_GET['nome']}}">
                              <input type="hidden" name="codigo" value="{{@$_GET['codigo']}}">
                              <input type="hidden" name="quantidade" value="{{@$_GET['quantidade']}}">
                              <input type="hidden" name="cor" value="{{@$_GET['cor']}}">
                              <button id="codigoUp" class="none_style">Código<span class="material-icons">expand_less</span></button>
                            </form>
                            @endif
                        </th>
                        <th scope="col" class="col-table" style="width:10%">
                            @if(!isset($nomeFiltragem) || $nomeFiltragem == 1)
                            <form method="GET" action="{{route('orderNomeSpot')}}">
                              <input type="hidden" name="parameter" value="down">
                              <input type="hidden" name="nome" value="{{@$_GET['nome']}}">
                              <input type="hidden" name="codigo" value="{{@$_GET['codigo']}}">
                              <input type="hidden" name="quantidade" value="{{@$_GET['quantidade']}}">
                              <input type="hidden" name="cor" value="{{@$_GET['cor']}}">
                              <button id="codigoDown" class="none_style">Nome<span class="material-icons">expand_more</span></button>
                            </form>
                            @else
                            <form method="GET" action="{{route('orderNomeSpot')}}">
                              <input type="hidden" name="parameter" value="up">
                              <input type="hidden" name="nome" value="{{@$_GET['nome']}}">
                              <input type="hidden" name="codigo" value="{{@$_GET['codigo']}}">
                              <input type="hidden" name="quantidade" value="{{@$_GET['quantidade']}}">
                              <input type="hidden" name="cor" value="{{@$_GET['cor']}}">
                              <button id="codigoUp" class="none_style">Nome<span class="material-icons">expand_less</span></button>
                            </form>
                            @endif
                        </th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                        <th scope="col" class="col-table" style="width:10%">
                            @if(!isset($categoriaFiltragem) || $categoriaFiltragem == 1)
                            <form method="GET" action="{{route('orderCategoriaSpot')}}">
                              <input type="hidden" name="parameter" value="down">
                              <input type="hidden" name="nome" value="{{@$_GET['nome']}}">
                              <input type="hidden" name="codigo" value="{{@$_GET['codigo']}}">
                              <input type="hidden" name="quantidade" value="{{@$_GET['quantidade']}}">
                              <input type="hidden" name="cor" value="{{@$_GET['cor']}}">
                              <button id="codigoDown" class="none_style">Categoria<span class="material-icons">expand_more</span></button>
                            </form>
                            @else
                            <form method="GET" action="{{route('orderCategoriaSpot')}}">
                              <input type="hidden" name="parameter" value="up">
                              <input type="hidden" name="nome" value="{{@$_GET['nome']}}">
                              <input type="hidden" name="codigo" value="{{@$_GET['codigo']}}">
                              <input type="hidden" name="quantidade" value="{{@$_GET['quantidade']}}">
                              <input type="hidden" name="cor" value="{{@$_GET['cor']}}">
                              <button id="codigoUp" class="none_style">Categoria<span class="material-icons">expand_less</span></button>
                            </form>
                            @endif
                        </th>
                        <th>&nbsp;</th>
                        <th scope="col" class="col-table" style="width:10%">
                            @if(!isset($marcaFiltragem) || $marcaFiltragem == 1)
                            <form method="GET" action="{{route('orderMarcaSpot')}}">
                              <input type="hidden" name="parameter" value="down">
                              <input type="hidden" name="nome" value="{{@$_GET['nome']}}">
                              <input type="hidden" name="codigo" value="{{@$_GET['codigo']}}">
                              <input type="hidden" name="quantidade" value="{{@$_GET['quantidade']}}">
                              <input type="hidden" name="cor" value="{{@$_GET['cor']}}">
                              <button id="codigoDown" class="none_style">Marca<span class="material-icons">expand_more</span></button>
                            </form>
                            @else
                            <form method="GET" action="{{route('orderMarcaSpot')}}">
                              <input type="hidden" name="parameter" value="up">
                              <input type="hidden" name="nome" value="{{@$_GET['nome']}}">
                              <input type="hidden" name="codigo" value="{{@$_GET['codigo']}}">
                              <input type="hidden" name="quantidade" value="{{@$_GET['quantidade']}}">
                              <input type="hidden" name="cor" value="{{@$_GET['cor']}}">
                              <button id="codigoUp" class="none_style">Marca<span class="material-icons">expand_less</span></button>
                            </form>
                            @endif
                        </th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($response as $cadaUm => $value)
                        <tr class="animation-element slide-aparece">
                            <th scope="row">{{ $value['ProdReference'] }}</th>
                            <td colspan="3">{{ $value['Name'] }}</td>
                            <td colspan="2">{{ $value['Type'] }}</td>
                            <td>{{ $value['Brand'] }}</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm btnAccordion">
                                    <span class="material-icons" id="expand-more-{{ $value['ProdReference'] }}"
                                        onclick="show_hide_information({{ $value['ProdReference'] }})">
                                        expand_more
                                    </span>
                                    <span class="material-icons" id="expand-less-{{ $value['ProdReference'] }}"
                                        style="display:none;"
                                        onclick="show_hide_information({{ $value['ProdReference'] }})">
                                        expand_less
                                    </span>
                                </button>
                            </td>
                            
                        </tr>

                        <tr class=" more-options col-12" id="more-information-{{ $value['ProdReference'] }}" style="display:none; ">
                                
                                <!-- <td class="hiddenRow" colspan="5">
                                    {{-- <img src="https://www.spotgifts.com.br/fotos/produtos/{{$value['MainImage']}}" alt="{{ $value['Name'] }}"> --}}
                                </td> -->
                            <td class="hiddenRow" colspan="8">
                                <ul class="aditional_details shadow-sm"> 
                                    <h2>Informações Adicionais</h2>
                                    <p>{{$value['ShortDescription']}}</p>
                                    <p>{{$value['CombinedSizes']}}</p>
                                    <p>{{$value['Colors']}}</p>
                                </ul>
                            </td>
                        </tr>
                        
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="pagination animation-element slide-aparece">
            {{ $response->appends(request()->query())->links() }}
        </div>
    </div>
    <script>
        function show_hide_information($parameter) {

            var x = document.getElementById("more-information-" + $parameter);
            if (x.style.display === "none") {
                x.style.display = "table-row";
                document.getElementById("expand-more-" + $parameter).style.display = "none";
                document.getElementById("expand-less-" + $parameter).style.display = "table-row";
            } else {
                x.style.display = "none";
                document.getElementById("expand-more-" + $parameter).style.display = "table-row";
                document.getElementById("expand-less-" + $parameter).style.display = "none";
            }

        }
    </script>
@endsection
