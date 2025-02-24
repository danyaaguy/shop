@extends('layouts.app')  

@section('content')  
<div class="container">  
    <h1>Список заказов</h1>  

    @if (session('success'))  
        <div class="alert alert-success">{{ session('success') }}</div>  
    @endif  

    <table class="table">  
        <thead>  
            <tr>  
                <th>ID</th>  
                <th>Дата создания</th>  
                <th>ФИО покупателя</th>  
                <th>Статус</th>  
                <th>Итоговая цена</th>  
                <th>Действия</th>  
            </tr>  
        </thead>  
        <tbody>  
            @foreach ($orders as $order)  
                <tr>  
                    <td>{{ $order->id }}</td>  
                    <td>{{ $order->created_at }}</td>  
                    <td>{{ $order->customer_full_name }}</td>  
                    <td>{{ $order->status }}</td>  
                    <td>{{ $order->product->price * $order->count }} руб.</td>  
                    <td>  
                        <a href="{{ route('orders.show', $order) }}" class="btn btn-info">Посмотреть</a>  
                    </td>  
                </tr>  
            @endforeach  
        </tbody>  
    </table>  
</div>  
@endsection