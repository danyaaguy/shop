@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $product->name }}</h1>
    <p><strong>Категория:</strong> {{ $product->category->name }}</p>
    <p><strong>Описание:</strong> {{ $product->description }}</p>
    <p><strong>Цена:</strong> {{ $product->price }} руб.</p>
    <a href="{{ route('orders.create') }}" class="btn btn-primary">Заказать</a>
    <a href="{{ route('products.index') }}" class="btn btn-secondary">Назад к списку товаров</a>
</div>  
@endsection