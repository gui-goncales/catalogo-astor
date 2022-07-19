@extends('layouts.app')

@section('content')
@include('xbz.filtros')
<div class="conteudo col-12 shadow-sm" style="width: 100%; overflow-x: auto;">
  <div class="container">
    <table class="table">
      <thead class="animation-element slide-aparece">
        <tr>
          <th scope="col" class="col-table">
            Imagem
          </th>
          <th scope="col" class="col-table" style="width:10%">
            @if(!isset($codigoFiltragem) || $codigoFiltragem == 1)
            <form method="GET" action="{{route('orderCodigo')}}">
              <input type="hidden" name="parameter" value="down">
              <input type="hidden" name="nome" value="{{@$_GET['nome']}}">
              <input type="hidden" name="codigo" value="{{@$_GET['codigo']}}">
              <input type="hidden" name="quantidade" value="{{@$_GET['quantidade']}}">
              <input type="hidden" name="cor" value="{{@$_GET['cor']}}">
              <button id="codigoDown" class="none_style">Código<span class="material-icons">expand_more</span></button>
            </form>
            @else
            <form method="GET" action="{{route('orderCodigo')}}">
              <input type="hidden" name="parameter" value="up">
              <input type="hidden" name="nome" value="{{@$_GET['nome']}}">
              <input type="hidden" name="codigo" value="{{@$_GET['codigo']}}">
              <input type="hidden" name="quantidade" value="{{@$_GET['quantidade']}}">
              <input type="hidden" name="cor" value="{{@$_GET['cor']}}">
              <button id="codigoUp" class="none_style">Código<span class="material-icons">expand_less</span></button>
            </form>
            @endif
          </th>
          <th scope="col" class="col-table">
            @if(!isset($nomeFiltragem) || $nomeFiltragem == 1)
            <form method="GET" action="{{route('orderNome')}}">
              <input type="hidden" name="parameter" value="down">
              <input type="hidden" name="nome" value="{{@$_GET['nome']}}">
              <input type="hidden" name="codigo" value="{{@$_GET['codigo']}}">
              <input type="hidden" name="quantidade" value="{{@$_GET['quantidade']}}">
              <input type="hidden" name="cor" value="{{@$_GET['cor']}}">
              <button id="nomeDown" class="none_style">Nome<span class="material-icons">expand_more</span></button>
            </form>
            @else
            <form method="GET" action="{{route('orderNome')}}">
              <input type="hidden" name="parameter" value="up">
              <input type="hidden" name="nome" value="{{@$_GET['nome']}}">
              <input type="hidden" name="codigo" value="{{@$_GET['codigo']}}">
              <input type="hidden" name="quantidade" value="{{@$_GET['quantidade']}}">
              <input type="hidden" name="cor" value="{{@$_GET['cor']}}">
              <button id="nomeDown" class="none_style">Nome<span class="material-icons">expand_less</span></button>
            </form>
            @endif
          </th>
          <th scope="col" class="col-table">
            @if(!isset($corFiltragem) || $corFiltragem == 1)
            <form method="GET" action="{{route('orderCor')}}">
              <input type="hidden" name="parameter" value="down">
              <input type="hidden" name="nome" value="{{@$_GET['nome']}}">
              <input type="hidden" name="codigo" value="{{@$_GET['codigo']}}">
              <input type="hidden" name="quantidade" value="{{@$_GET['quantidade']}}">
              <input type="hidden" name="cor" value="{{@$_GET['cor']}}">
              <button id="corDown" class="none_style">Cor<span class="material-icons">expand_more</span></button>
            </form>
            @else
            <form method="GET" action="{{route('orderCor')}}">
              <input type="hidden" name="parameter" value="up">
              <input type="hidden" name="nome" value="{{@$_GET['nome']}}">
              <input type="hidden" name="codigo" value="{{@$_GET['codigo']}}">
              <input type="hidden" name="quantidade" value="{{@$_GET['quantidade']}}">
              <input type="hidden" name="cor" value="{{@$_GET['cor']}}">
              <button id="corUp" class="none_style">Cor<span class="material-icons">expand_less</span></button>
            </form>
            @endif
          </th>
          <th scope="col" class="col-table">
            Ncm
          </th>
          <th scope="col" class="col-table" style="text-align: center; width: 15%;">
            Qtd. Estoque
          </th>
          <th scope="col" class="col-table" style="text-align: center;">
            @if(!isset($statusFiltragrem) || $statusFiltragrem == 1)
            <form method="GET" action="{{route('orderStatus')}}">
              <input type="hidden" name="parameter" value="down">
              <input type="hidden" name="nome" value="{{@$_GET['nome']}}">
              <input type="hidden" name="codigo" value="{{@$_GET['codigo']}}">
              <input type="hidden" name="quantidade" value="{{@$_GET['quantidade']}}">
              <input type="hidden" name="cor" value="{{@$_GET['cor']}}">
              <button id="statusDown" class="none_style">Status<span class="material-icons">expand_more</span></button>
            </form>
            @else
            <form method="GET" action="{{route('orderStatus')}}">
              <input type="hidden" name="parameter" value="up">
              <input type="hidden" name="nome" value="{{@$_GET['nome']}}">
              <input type="hidden" name="codigo" value="{{@$_GET['codigo']}}">
              <input type="hidden" name="quantidade" value="{{@$_GET['quantidade']}}">
              <input type="hidden" name="cor" value="{{@$_GET['cor']}}">
              <button id="statusUp" class="none_style">Status<span class="material-icons">expand_less</span></button>
            </form>
            @endif
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($response as $key => $value)
        @switch($value['IdStatusConfiabilidade'])
        @case(10)
        @if(isset($_GET['quantidade']))
        @if($value['QuantidadeDisponivel'] <= 0) <?php $cor = "red" ?> @elseif($value['QuantidadeDisponivel'] < $_GET['quantidade']) <?php $cor = "blue" ?> @else <?php $cor = "green" ?> @endif @elseif($value['QuantidadeDisponivel'] <=0) <?php $cor = "red" ?> @else <?php $cor = "green" ?> @endif @break @case(20) @if(isset($_GET['quantidade'])) @if($value['QuantidadeDisponivel']<=0) <?php $cor = "red" ?> @elseif($value['QuantidadeDisponivel'] < $_GET['quantidade']) <?php $cor = "blue" ?> @else <?php $cor = "green" ?> @endif @elseif($value['QuantidadeDisponivel']<=0) <?php $cor = "red" ?> @else <?php $cor = "green" ?> @endif @break @case(30) <?php $cor = "red"; ?> @break @endswitch <tr class="{{$cor}} animation-element slide-aparece">
          <td width="10%">
            <img class="img_produto" src="{{$value['ImageLink']}}" alt="IMAGEM DO PRODUTO {{$value['Nome']}}" class="img-fluid">
          </td>
          <td>{{ $value['CodigoComposto'] }}</td>
          <td>{{ $value['Nome'] }}</td>
          <td>{{ $value['CorWebPrincipal'] }}</td>
          <td>{{ $value['Ncm'] }}</td>
          <td style="text-align: center;">{{ $value['QuantidadeDisponivel'] }}</td>
          @switch($value['IdStatusConfiabilidade'])
          @case(10)

          @if(isset($_GET['quantidade']))
          @if($value['QuantidadeDisponivel'] <= 0) <td>Indisponível</td>
            @elseif($value['QuantidadeDisponivel'] < $_GET['quantidade']) <td>Somente {{ $value['QuantidadeDisponivel'] }} Peças</td>
              @else
              <td>Disponível</td>
              @endif
              @else
              @if($value['QuantidadeDisponivel'] <= 0) <td>Indisponível</td>
                @else
                <td>Disponível</td>
                @endif
                @endif
                @break
                @case(20)
                @if(isset($_GET['quantidade']))
                @if($value['QuantidadeDisponivel'] <= 0) <td>Consulte</td>
                  @elseif($value['QuantidadeDisponivel'] < $_GET['quantidade']) <td>Somente {{ $value['QuantidadeDisponivel'] }} Peças</td>
                    @else
                    <td>Disponível</td>
                    @endif
                    @else
                    <td>Disponível</td>
                    @endif
                    @break
                    @case(30)
                    <td>Indisponível</td>
                    @break
                    @default
                    <td></td>
                    @break
                    @endswitch
                    </tr>
                    @endforeach
      </tbody>
    </table>
  </div>
  <div class="pagination animation-element slide-aparece">
    {{ $response->appends(request()->query())->links() }}
  </div>
</div>
@endsection