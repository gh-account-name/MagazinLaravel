<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'password'=>['required'],
         ], [
            'password.required'=>'Это обязательное поле',
         ]);

        if(md5($request->password) === Auth::user()->password){
            $order->status = 'в обработке';
            $order->update();

            return redirect()->route('ordersPage')->with('success', 'Мы обрабатываем ваш заказ');
        } else {
            return redirect()->back()->with('error', 'Неверный пароль');
        }
    }

    public function destroy(Order $order){
        $order->delete();
        return redirect()->back()->with('alert', 'Заказ отменён');
    }

    public function confirmOrder(Order $order){
        $carts = Cart::query()->where('order_id', $order->id)->get();

        foreach($carts as $cart){
            $product = Product::query()->where('id', $cart->product_id)->first();
            $product->count -= $cart->count;
            $product->update();
        }

        $order->status = 'подтверждён';
        $order->update();

        return redirect()->back()->with('success', 'Вы подтвердили заказ №' . $order->id);
    }

    public function rejectOrder(Request $request, Order $order){
        $request->validate([
            'comment'=>['required'],
        ],[
            'comment.required' => 'Укажите причину',
        ]);

        $order->comment = $request->comment;
        $order->status = 'отклонён';
        $order->update();

        return redirect()->route('adminOrdersPage')->with('alert', 'Вы отклонили заказ №' . $order->id);
    }

}
