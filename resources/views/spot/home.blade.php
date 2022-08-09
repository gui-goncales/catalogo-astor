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
                    <th>
                        <img src="https://www.spotgifts.com.br/fotos/produtos/{{$value['MainImage']}}" alt="" height="50px">
                    </th>
                    <th scope="row">{{ $value['ProdReference'] }}</th>
                    <td colspan="3">{{ $value['Name'] }}</td>
                    <td colspan="2">{{ $value['SubType'] }}</td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm btnAccordion">
                            <span class="material-icons" id="expand-more-{{ $value['ProdReference'] }}" onclick="show_hide_information({{ $value['ProdReference'] }})">
                                expand_more
                            </span>
                            <span class="material-icons" id="expand-less-{{ $value['ProdReference'] }}" style="display:none;" onclick="show_hide_information({{ $value['ProdReference'] }})">
                                expand_less
                            </span>
                        </button>
                    </td>

                </tr>

                <tr class=" more-options col-12" id="more-information-{{ $value['ProdReference'] }}" style="display:none; ">
                    <td class="hiddenRow" colspan="8">
                        <ul class="aditional_details shadow-sm">
                            <h2>Informações Adicionais</h2>
                            <div class="aditional">
                                <p>{{$value['Campos']}}</p>
                                <p><b>Tamanhos disponíveis: </b>{{$value['CombinedSizes']}}</p>
                                <p><b>Cores disponíveis:</b> {{$value['Colors']}}</p>
                                <p><b>Descrição:</b> {{$value['Description']}}</p>
                            </div>
                            <div class="moreItems">
                                @foreach($skus as $key => $sku)
                                @if($key == $value['ProdReference'])
                                @foreach($sku as $infoSku)
                                <div class="itemChild col-6 col-md-3">
                                    <p><b>Cor:</b> <span style="background:{{$infoSku['ColorHex']}}; width: 10px; height: 10px; display: inline-block; border: 1px solid #ededed;"></span> {{$infoSku['ColorDesc']}}</p>
                                    @if($infoSku['Size'] != null)
                                    <p><b>Tamanho:</b> {{$infoSku['Size']}}</p>
                                    @else

                                    @endif
                                    <p><b>Quantidade:</b> {{$infoSku['Quantity']}}</p>
                                    <p><b>Proxima Remessa:</b>
                                        @if($infoSku['NextQuantity'] == null)
                                        Sem previsão
                                        @else
                                        {{$infoSku['NextQuantity']}}
                                        @endif
                                    </p>
                                    <p><b>Data proxima remessa:</b>
                                        @if($infoSku['NextDate'] == null)
                                        Sem previsão
                                        @else
                                        {{$infoSku['NextDate']}}
                                        @endif
                                    </p>
                                </div>
                                @endforeach
                                @endif
                                @endforeach
                            </div>
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