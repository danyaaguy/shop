@extends('layouts.app')  

@section('content')  
<div class="container">  
    <h1>Список товаров</h1>  
    <a href="{{ route('admin.products.create', '','admin') }}" class="btn btn-primary">Добавить товар</a>  

    @if (session('success'))  
        <div class="alert alert-success">{{ session('success') }}</div>  
    @endif  

    <table class="table">  
        <thead>  
            <tr>  
                <th>Название</th>  
                <th>Цена</th>  
                <th>Категория</th>  
                <th>Действия</th>  
            </tr>  
        </thead>  
        <tbody>  
            @foreach ($products as $product)  
                <tr>  
                    <td><a href="{{ route('admin.products.show', $product) }}">{{ $product->name }}</a></td>  
                    <td>{{ $product->price }} руб.</td>  
                    <td>{{ $product->category->name }}</td>  
                    <td>  
                        <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-warning">Редактировать</a>  
                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST" style="display:inline;">  
                            @csrf  
                            @method('DELETE')  
                            <button type="submit" class="btn btn-danger">Удалить</button>  
                        </form>  
                    </td>  
                </tr>  
            @endforeach  
        </tbody>  
    </table>  
</div>  
@endsection