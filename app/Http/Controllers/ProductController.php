<?php

namespace App\Http\Controllers;

use App\Models\Categry;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function addProduct(Request $request){

        $request->validate([
            'title' => ['required'],
            'img' => ['required', 'mimes:png,jpg,jpeg', 'max:1024'],
            'category' => ['required'],
            'price' => ['required', 'numeric', 'regex:/^\d*$|^\d*\.\d{1,2}$/'],
            'count' => ['required', 'numeric', 'between:0,1000000'],
        ], [
            'title.required' => 'Обязательное поле для заполнения',
            'title.regex' => 'Поле содержит только кирилицу',
            'img.required' => 'Обязательное поле для заполнения',
            'img.mimes' => 'Допустимое разрешение: png, jpg, jpeg',
            'img.max' => 'Размер файла не должен превышать 1Мб',
            'category.required' => 'Укажите категорию',
            'price.required' => 'Обязательное поле для заполнения',
            'price.numeric' => 'Поле должно быть числовым',
            'price.regex' => 'Укажите цену в рублях',
            'count.required' => 'Обязательное поле для заполнения',
            'count.numeric' => 'Поле должно быть числовым',
            'count.between' => 'Поле должно содержать числа от 0 до 1000000',
        ]);


        $path_img = '';
        if ($request->file('img')){
            $path_img = $request->file('img')->store('public/img');
        }

        $product = new Product();
        $product->title = $request->title;
        $product->categry_id = $request->category;
        $product->img = '/storage/' . $path_img;
        $product->age = $request->age;
        $product->antagonist = $request->antagonist;
        $product->price = $request->price;
        $product->count = $request->count;

        $product->save();

        return redirect()->route('catalogPage');
    }

    public function update(Request $request, Product $product){

        $request->validate([
            'title' => ['required'],
            'img' => ['mimes:png,jpg,jpeg','max:1024'],
           'category' => ['required'],
            'price' => ['required', 'numeric'],
            'count' => ['required', 'numeric', 'between:0,1000000'],
        ], [
            'title.required' => 'Обязательное поле для заполнения',
            'title.regex' => 'Поле содержит только кирилицу',
            'img.mimes' => 'Допустимое разрешение: png, jpg, jpeg',
            'img.max' => 'Размер файла не должен превышать 1Мб',
            'category.required' => 'Укажите категорию',
            'price.required' => 'Обязательное поле для заполнения',
            'price.numeric' => 'Поле должно быть числовым',
            'count.required' => 'Обязательное поле для заполнения',
            'count.numeric' => 'Поле должно быть числовым',
            'count.between' => 'Поле должно содержать числа от 0 до 1000000',
        ]);


        if ($request->file('img')){
            $path_img = $request->file('img')->store('public/img');
            $product->img = '/storage/' . $path_img;
        }

        $product->title = $request->title;
        $product->categry_id = $request->category;
        $product->age = $request->age;
        $product->antagonist = $request->antagonist;
        $product->price = $request->price;
        $product->count = $request->count;

        $product->update();

        return redirect()->route('catalogPage');
    }

    public function destroy(Product $product){
        $path = substr($product->img, 9);
        Storage::delete($path);
        $product->delete();
        return redirect()->back();
    }

    // public function filter(Request $request){

    //     $categories = Categry::all();

    //     $products = Product::query()->paginate(3)->withQueryString();

    //     if ($request->category && $request->category!==0){
    //         $products = Product::query()->where('categry_id', $request->category)->paginate(3)->withQueryString();
    //     }

    //     return view('product.catalog', ['products'=>$products, 'categories'=>$categories]);

    // }

    // public function sort(Request $request){
    //     $categories = Categry::all();

    //     if ($request->parameter){
    //         $products = Product::query()->orderBy($request->parameter)->paginate(3)->withQueryString();
    //     } else {
    //         $products = Product::query()->orderBy('title')->paginate(3)->withQueryString();
    //     }

    //     return view('product.catalog', ['products'=>$products, 'categories'=>$categories]);

    // }

    public function sort_filter(Request $request){

        $categories = Categry::all();

        $products = Product::query();

       if ($request->category && $request->category!==0){
            $products = $products->where('categry_id', $request->category);
       }

       if ($request->parameter){
            $products = $products->orderBy($request->parameter);
       }

       $products = $products->latest()->paginate(6)->withQueryString();

        return view('product.catalog', ['products'=>$products, 'categories'=>$categories]);
    }

}
