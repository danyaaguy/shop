@extends('layouts.app')  

@section('content')  
<div class="container">  
    <h1>Редактировать товар</h1>  

    <form action="{{ route('admin.products.update', $product) }}" method="POST">  
        @csrf  
        @method('PUT')  
        <div class="mb-3">  
            <label class="form-label">Название</label>  
            <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>  
        </div>  
        <div class="mb-3">  
            <label class="form-label">Категория</label>  
            <select name="category_id" class="form-select" required>  
                @foreach($categories as $category)  
                    <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>  
                @endforeach  
            </select>  
        </div>  
        <div class="mb-3">  
            <label class="form-label">Описание</label>  
            <textarea name="description" class="form-control">{{ $product->description }}</textarea>  
        </div>  
        <div class="mb-3">  
            <label class="form-label">Цена (в рублях)</label>  
            <input type="number" name="price" class="form-control" value="{{ $product->price }}" step="0.01" required>  
        </div>  
        <button type="submit" class="btn btn-primary">Обновить товар</button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Назад к списку товаров</a>  
    </form>  
</div>  
@endsection