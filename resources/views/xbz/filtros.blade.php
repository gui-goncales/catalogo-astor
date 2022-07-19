<div class="filtros col-12 shadow-sm">
  <div class="container">
    <div class="col-12">
      <form method="GET" action="{{route('consultaBanco')}}">

        <div class="item-group  col-12 col-sm-3 animation-element slide-aparece">
          <label id="codigo">Código:</label>
          <input type="text" class="form-control" placeholder="Código" aria-label="codigo" aria-describedby="codigo" name="codigo" value="{{@$_GET['codigo']}}">
        </div>


        <div class="item-group col-12 col-sm-3 animation-element slide-aparece">
          <label id="quantidade">Quantidade: </label>
          <input type="text" class="form-control" placeholder="Insira a quantidade" aria-label="quantidade" aria-describedby="quantidade" name="quantidade" value="{{@$_GET['quantidade']}}" required>
        </div>

        <div class="item-group col-12 col-sm-6 animation-element slide-aparece">
          <label id="nome">Nome:</label>
          <input type="text" class="form-control" placeholder="Nome do produto" aria-label="nome" aria-describedby="nome" name="nome" value="{{@$_GET['nome']}}">
        </div>



        <div class="item-group col-12 col-sm-4 animation-element slide-aparece">
          <label for="cor">Cor</label>
          <select class="form-select" id="cor" name="cor">
            <option disabled>Escolha a cor...</option>
            @if(isset($cores))
            @foreach($cores as $key => $value)
            @if(@$_GET['cor'] == $value['CorWebPrincipal'])
            <option value="{{$value['CorWebPrincipal']}}" selected>{{$value['CorWebPrincipal']}}</option>
            @else
            <option value="{{$value['CorWebPrincipal']}}">{{$value['CorWebPrincipal']}}</option>
            @endif
            @endforeach
            @endif
          </select>
        </div>

        <div class="item-group col-2 animation-element slide-aparece">
          <label for="orderPreco">Ordenar Por</label>
          <select class="form-select" name="preco" id="orderPreco">
            @switch(@$_GET['preco'])
            @case('DESC')
            <option value="DESC" selected>Maior Preço</option>
            <option value="ASC">Menor Preço</option>
            @break
            @case('ASC')
            <option value="DESC">Maior Preço</option>
            <option value="ASC" selected>Menor Preço</option>
            @break
            @default
            <option value="DESC" selected>Maior Preço</option>
            <option value="ASC">Menor Preço</option>
            @break
            @endswitch
          </select>
        </div>

        <div class="item-group itemClear col-12 col-xl-2 align-center animation-element slide-aparece"><a href="{{route('home')}}" class="btn btn-lg btn-danger bntlimpascampos"><span class="material-icons">delete_forever</span> Limpar Busca</a></div>
        <div class="item-group itemClear col-12 col-xl-4 animation-element slide-aparece" style="text-align: center;">
          <button type="submit" class="btn btn-lg btn-primary btnpesquisar"><span class="material-icons">search</span> Pesquisar</button>
        </div>
    </div>

    </form>
  </div>
</div>