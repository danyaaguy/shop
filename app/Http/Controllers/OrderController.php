<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Просмотр списка заказов  
    public function index()
    {
        $orders = Order::all();
        return view('admin.orders.index', compact('orders'));
    }

    // Показать форму для создания нового заказа  
    public function create(Request $request)
    {
        // Получаем ID продукта из запроса  
        $productId = $request->query('product');

        // Пытаемся получить продукт, если передан ID  
        if ($productId) {
            $product = Product::find($productId);
        }

        if ($request->is('admin*')) {
            return view('admin.orders.create');
        }

        return view('user.orders.create', ['product' => $product ?? []]);
    }

    // Сохранить новый заказ  
    public function store(Request $request)
    {
        $request->validate([
            'customer_full_name' => 'required|string',
            'count' => 'required|numeric|min:1',
            'customer_comment' => 'nullable|string',
            'product_id' => 'required|exists:products,id',
        ]);

        Order::create($request->all());
        return redirect()->route('products.index')->with('success', 'Заказ успешно добавлен.');
    }

    // Показать полный заказ  
    public function show(Order $order)
    {
        return view('admin.orders.show', compact('order'));
    }

    // Обновить статус заказа  
    public function update(Request $request, Order $order)
    {
        $order->status = 'completed';
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Статус заказа обновлен на "выполнен".');
    }
}
