<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add(Product $product){
        $order = Order::query()
            ->where('user_id', Auth::id())
            ->where('status', 'новый')
            ->firstOrCreate(['user_id'=>Auth::id()], ['status'=>'новый']);

        $cart = Cart::query()
            ->where('order_id', $order->id)
            ->where('product_id', $product->id)
            ->firstOrCreate(['order_id'=>$order->id], ['product_id'=>$product->id]);

        if($cart->count){
            if ($product->count > $cart->count){
                $cart->count += 1;
                $cart->summ = $product->price * $cart->count;
                $cart->save();

                $order->summ += $product->price;
                $order->save();

                return redirect()->back()->with('success', 'Товар добавлен в корзину');

            } else {
                return redirect()->back()->with('error', 'Товара нет в таком количестве');
            }
        } else {
            $cart->count = 1;
            $cart->summ = $product->price;
            $order->summ += $cart->summ;
            $cart->save();
            $order->save();

            return redirect()->back()->with('success', 'Товар добавлен в корзину');
        }
    }

    public function minus(Product $product){
        $order = Order::query()
            ->where('user_id', Auth::id())
            ->where('status', 'новый')
            ->first();

        $cart = Cart::query()
            ->where('order_id', $order->id)
            ->where('product_id', $product->id)
            ->first();

        if($cart->count > 1){
            $cart->count -= 1;
            $cart->summ -= $product->price;
            $order->summ -= $product->price;
            $cart->update();
            $order->update();

            return redirect()->back();
        } else {
            $order->summ -= $product->price * $cart->count;
            $cart->delete();
            $order->update();

            return redirect()->back();
        }
    }

    public function destroy(Product $product){
        $order = Order::query()
            ->where('user_id', Auth::id())
            ->where('status', 'новый')
            ->first();

        $cart = Cart::query()
            ->where('order_id', $order->id)
            ->where('product_id', $product->id)
            ->first();

        $order->summ -= $product->price * $cart->count;
        $cart->delete();
        $order->update();

        return redirect()->back();
    }
}
