@extends('layouts.app')  

@section('content')  
<div class="container">  
    <h1>{{ $product->name }}</h1>  
    <p><strong>Категория:</strong> {{ $product->category->name }}</p>  
    <p><strong>Описание:</strong> {{ $product->description }}</p>  
    <p><strong>Цена:</strong> {{ $product->price }} руб.</p>  
    <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-warning">Редактировать</a>  
    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" style="display:inline;">  
        @csrf  
        @method('DELETE')  
        <button type="submit" class="btn btn-danger">Удалить</button>  
    </form>  
    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Назад к списку товаров</a>  
</div>  
@endsection