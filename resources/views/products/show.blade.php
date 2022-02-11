@extends('layouts.main')

@section('title', $product->title)

@section('content')

<div class="col-md-10 offset-md-1">
  <div class="row">
    <div id="image-container" class="col-md6">
      <img src="/public/img/iphone-13-rosa.png" alt="{{ $product->nome }}">
    </div>
    <div id="info-container" class="col-md6">
      <h1>{{ $product->title }}</h1>
      <p class="product-preco">Preco: {{$product->preco}}</p>
      <p class="product-descricao">Celular</p>
      <a href="#" class="btn btn-primary" id="product-submit">Comprar</a>
    </div>
  </div>
</div>

@endsection