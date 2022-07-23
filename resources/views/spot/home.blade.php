@extends('layouts.app')

@section('content')
    @include('spot.filtros')
    <div class="conteudo col-12 shadow-sm" style="width: 100%; overflow-x: auto;">
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        @include('spot.headerTable')
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
                            <td class="hiddenRow" colspan="8">
                                <ul class="aditional_details shadow-sm"> 
                                    <h2>Informações Adicionais</h2>
                                    <p>{{$value['Campos']}}</p>
                                    <p>{{$value['CombinedSizes']}}</p>
                                    <p>{{$value['Colors']}}</p>
                                    @foreach($skus as $key => $sku)
                                        @if($key == $value['ProdReference'])
                                            @foreach($sku as $infoSku)
                                            <p>Quantidade: {{$infoSku['Quantity']}}</p>
                                            <p>Tamanho: {{$infoSku['Size']}}</p>
                                            <p>Cor: {{$infoSku['ColorDesc']}}</p>
                                            <p>Cor Hex: {{$infoSku['ColorHex']}}</p>
                                            <p>Proxima Remessa: {{$infoSku['NextQuantity']}}</p>
                                            <p>Data proxima remessa: {{$infoSku['NextDate']}}</p>
                                            @endforeach
                                        @endif
                                    @endforeach
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
