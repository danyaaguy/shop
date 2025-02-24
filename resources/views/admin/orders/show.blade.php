@extends('layouts.app')  

@section('content')  
<div class="container">  
    <h1>Заказ #{{ $order->id }}</h1>  
    <p><strong>ФИО покупателя:</strong> {{ $order->customer_full_name }}</p>  
    <p><strong>Дата создания:</strong> {{ $order->created_at }}</p>  
    <p><strong>Статус:</strong> {{ $order->status }}</p>  
    <p><strong>Комментарий:</strong> {{ $order->customer_comment }}</p>  
    <p><strong>Итоговая цена:</strong> {{ $order->product->price * $order->count }} руб.</p>  

    @if ($order->status == 'new')  
        <form action="{{ route('admin.orders.update', $order) }}" method="POST">  
            @csrf  
            @method('PUT')  
            <button type="submit" class="btn btn-success">Изменить статус на "выполнен"</button>  
        </form>  
    @endif  

    <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">Назад к списку заказов</a>  
</div>  
@endsection