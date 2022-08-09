<div class="filtros col-12 shadow-sm">
  <div class="container">
    <div class="col-12">
      <form method="GET" action="{{route('consultaBancoSpot')}}">

        <div class="item-group  col-12 col-sm-3 animation-element slide-aparece">
          <label id="codigo">Código:</label>
          <input type="text" class="form-control" placeholder="Código" aria-label="codigo" aria-describedby="codigo" name="codigo" value="{{@$_GET['codigo']}}">
        </div>

        <div class="item-group col-12 col-sm-6 animation-element slide-aparece">
          <label id="nome">Nome:</label>
          <input type="text" class="form-control" placeholder="Nome do produto" aria-label="nome" aria-describedby="nome" name="nome" value="{{@$_GET['nome']}}">
        </div>

        <div class="item-group col-12 col-sm-3 animation-element slide-aparece">
          <label for="cor" class="form-label">Cores:</label>
          <select class="form-control" name="cor" id="cor">
            <option value="" selected>Escolha uma cor...</option>
            @foreach($cores as $cadaum => $value)
              <option value="{{$value}}">{{$value}}</option>
            @endforeach
          </select>
        </div>

        <div class="item-group col-12 col-sm-2 animation-element slide-aparece">
          <label id="quantidade">Quantidade:</label>
          <input type="text" class="form-control" placeholder="Quantidade" aria-label="quantidade" aria-describedby="quantidade" name="quantidade" value="{{@$_GET['quantidade']}}">
        </div>

        {{-- <div class="item-group col-12 col-sm-3 animation-element slide-aparece">
          <label for="brand" class="form-label">Marca:</label>
          <select class="form-control" name="brand" id="brand">
            <option value="" selected>Escolha uma marca</option>
            @foreach($brand as $cadaum => $value)
              <option value="{{$value['Brand']}}">{{$value['Brand']}}</option>
            @endforeach
          </select>
        </div> --}}

        <div class="item-group col-12 col-sm-3 animation-element slide-aparece">
          <label for="categoria" class="form-label">Categoria:</label>
          <select class="form-control" name="categoria" id="categoria">
            <option value="" selected>Escolha uma marca</option>
            @foreach($categoria as $cadaum => $value)
              <option value="{{$value['SubType']}}">{{$value['SubType']}}</option>
            @endforeach
          </select>
        </div>

        <div class="item-group col-12 col-sm-4 animation-element slide-aparece">
          <label for="tamanho" class="form-label">Tamanhos:</label>
          <select class="form-control" name="tamanho" id="tamanho">
            <option value="" selected>Escolha um tamanho</option>
            @foreach($tamanhos as $cadaum => $value)
              <option value="{{$value['CombinedSizes']}}">{{$value['CombinedSizes']}}</option>
            @endforeach
          </select>
        </div>

        <div class="item-group itemClear col-12 col-xl-2 align-center animation-element slide-aparece"><a href="{{route('spot')}}" class="btn btn-lg btn-danger bntlimpascampos"><span class="material-icons">delete_forever</span> Limpar Busca</a></div>
        <div class="item-group itemClear col-12 col-xl-4 animation-element slide-aparece" style="text-align: center;">
          <button type="submit" class="btn btn-lg btn-primary btnpesquisar"><span class="material-icons">search</span> Pesquisar</button>
        </div>
    </div>

    </form>
  </div>
</div>