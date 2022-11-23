<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Categry;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function welcomePage(){
        $lastProducts = Product::query()->orderByDesc('created_at')->limit(3)->get();
        return view('welcome', ['lastProducts'=>$lastProducts]);
    }

    public function registrationPage(){
        return view('user.registration');
    }

    public function authPage(){
        return view('user.auth');
    }

    public function categoriesPage(){
        $categories = Categry::all();
        return view('admin.categories', ['categories'=>$categories]);
    }

    public function editCategoryPage(Categry $category){
        return view('admin.editCategory', ['category'=>$category]);
    }

//    public function catalogPage(){
//        $products = Product::query()->with('category')->paginate(3);
//        $categories = Categry::all();
//        return view('product.catalog', ['products'=>$products, 'categories'=>$categories]);
//    }

    public function productsPage(){
        $categories = Categry::all();
        $products = Product::query()->with('categry')->latest()->get();
        return view('admin.products', ['categories'=>$categories, 'products'=>$products]);
    }

    public function editProductPage(Product $product){
        $categories = Categry::all();
        return view('admin.editProduct', ['product'=>$product, 'categories'=>$categories]);
    }

    public function productPage(Product $product){
        return view('product.productPage', ['product'=>$product]);
    }

    public function cartPage(){
        $order = Order::query()
            ->where('user_id', Auth::id())
            ->where('status', 'новый')->firstOrNew();


        $cart = Cart::query()
            ->where('order_id', $order->id)
            ->with('product')->get();

        return view('user.cart', ['cart'=>$cart]);
    }

    public function ordersPage(){
        $orders = Order::query()
            ->where('user_id', Auth::id())->where('status','!=','новый')->withSum('cart', 'count')->get();


//        foreach ($orders as $key => $order){
//            if ($order->summ == 0){
//                unset($orders[$key]);
//            }
//
//        }

        return view('user.orders', ['orders'=>$orders]);
    }

    public function adminOrdersPage(){
        $orders = Order::query()
            ->where('status','!=','новый')->get();

        return view('admin.orders', ['orders'=>$orders]);
    }

    public function rejectOrderPage(Order $order){
        return view('admin.rejectOrder', ['order'=>$order]);
    }

    public function orderDetailsPage(Order $order){
        $cart = Cart::query()
            ->where('order_id', $order->id)->get();

        return view('product.orderDetailsPage', ['cart'=>$cart]);
    }
}
