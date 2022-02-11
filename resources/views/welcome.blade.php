@extends('layouts.main')

@section('title', 'Lojinha')

@section('content')

<div id="search-container" class="col-md-12">
  <h1>Busque um produto</h1>
  <form action="/" method="GET">
    <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
  </form>
</div>
<div id="products-container" class="col-md-12">
  @if($search)
  <h2>Resultados para: {{ $search }}</h2>
  @else
  <h2>Produtos disponiveis</h2>
  @endif
  @if($search)
  <p class="subtitle">Adicione sua busca ao carrinho</p>
  @else
  <p class="subtitle">Selecione o produto ideal para voce</p>
  @endif
  <div id="cards-container" class="row">
    @foreach($products as $product)
    <div class="card col-md-3">
      <img src="/img/iphone-13-rosa.png" alt="{{ $product->nome }}">
      <div class="card-body">
      <p class="card-nome">{{ $product->nome }}</p>
        <p class="card-preco">3.999 R$</p>
        <h5 class="card-quantidade">Quantidade: {{ $product->quantidade }}</h5>
        <a href="/produto/{{ $product->id }}"class="btn btn-primary">Ver mais</a>
      </div>
    </div>
    @endforeach
    @if(count($products) === 0)
    <p>Nenhum produto encontrado</p>
    <a href="/">Voltar ao inicio</a>
    @endif
  </div>
</div>

@endsection