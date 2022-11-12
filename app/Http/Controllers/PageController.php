<?php

namespace App\Http\Controllers;

use App\Models\Categry;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
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

    public function catalogPage(){
        $products = Product::query()->paginate(3);
        $categories = Categry::all();
        return view('product.catalog', ['products'=>$products, 'categories'=>$categories]);
    }

    public function productsPage(){
        $categories = Categry::all();
        $products = Product::query()->latest()->get();
        return view('admin.products', ['categories'=>$categories, 'products'=>$products]);
    }

    public function editProductPage(Product $product){
        $categories = Categry::all();
        return view('admin.editProduct', ['product'=>$product, 'categories'=>$categories]);
    }
}
