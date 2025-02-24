<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Просмотр списка товаров  
    public function index(Request $request)
    {
        $products = Product::with(relations: 'category')->get();

        if ($request->is('admin*')) {
            return view('admin.products.index', compact('products'));
        }

        return view('user.products.index', compact('products'));
    }

    // Показать форму для создания нового товара  
    public function create(Request $request)
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    // Сохранить новый товар  
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);

        Product::create($request->all());
        return redirect()->route('admin.products.index')->with('success', 'Товар успешно добавлен.');
    }

    // Показать полную информацию о товаре  
    public function show(Product $product, Request $request)
    {
        if ($request->is('admin*')) {
            return view('admin.products.show', compact('product'));
        }

        return view('user.products.show', compact('product'));
    }

    // Показать форму для редактирования товара  
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    // Обновить товар  
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);

        $product->update($request->all());
        return redirect()->route('admin.products.index')->with('success', 'Товар успешно обновлен.');
    }

    // Удалить товар  
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Товар успешно удален.');
    }
}
