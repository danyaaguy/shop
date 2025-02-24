@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Оформление заказа</h1>

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Название</label>
            <input class="form-control" type="text" value="{{ $product->name }}" aria-label="Disabled input example" disabled readonly>
            <input name="product_id" value="{{ $product->id }}" hidden>
        </div>
        <div class="mb-3">
            <label class="form-label">ФИО</label>
            <input type="text" name="customer_full_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Количество единиц</label>
            <input id="count" class="form-control" name="count" type="number" min="1" value="1" oninput="updateTotalPrice()">
        </div>
        <div class="mb-3">
            <label class="form-label">Итоговая цена (в рублях):</label>
            <input id="total-price" class="form-control" type="text" value="{{ $product->price }}" aria-label="Disabled input example" disabled readonly>
        </div>
        <div class="mb-3">
            <label class="form-label">Комментарий</label>
            <textarea name="customer_comment" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Заказать</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Назад к списку товаров</a>
    </form>
</div>
<script>
    const productPrice = document.getElementById('total-price').value;

    function updateTotalPrice() {  
        const count = document.getElementById('count').value;  
        const totalPrice = productPrice * count;  
        document.getElementById('total-price').value = totalPrice;  
    }  
</script> 
@endsection 