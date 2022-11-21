<?php

namespace App\Http\Controllers;

use App\Models\Order;
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

}
