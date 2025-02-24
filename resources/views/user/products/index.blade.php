@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Товары</h1>

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
                <td><a href="{{ route('products.show', $product) }}">{{ $product->name }}</a></td>
                <td>{{ $product->price }} руб.</td>
                <td>{{ $product->category->name }}</td>
                <td>
                    <a href="{{ route('orders.create', ['product' => $product]) }}" class="btn btn-primary">Заказать</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection