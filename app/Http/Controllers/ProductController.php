<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function addProduct(Request $request){

        $request->validate([
            'title' => ['required', 'regex:/[А-Яа-яЁё]/u'],
            'img' => ['required', 'mimes:png,jpg,jpeg','size:5'],
            'category' => ['required'],
            'price' => ['required', 'numeric'],
            'count' => ['required', 'numeric', 'between:0,1000000'],
        ], [
            'title.required' => 'Обязательное поле для заполнения',
            'title.regex' => 'Поле содержит только кирилицу',
            'img.required' => 'Обязательное поле для заполнения',
            'img.mimes' => 'Допустимое разрешение: png, jpg, jpeg',
            'category.required' => 'Укажите категорию',
            'price.required' => 'Обязательное поле для заполнения',
            'price.numeric' => 'Поле должно быть числовым',
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
            'title' => ['required', 'regex:/[А-Яа-яЁё]/u'],
            'img' => ['required', 'mimes:png,jpg,jpeg','size:5'],
//            'category' => ['required'],
            'price' => ['required', 'numeric'],
            'count' => ['required', 'numeric', 'between:0,1000000'],
        ], [
            'title.required' => 'Обязательное поле для заполнения',
            'title.regex' => 'Поле содержит только кирилицу',
            'img.required' => 'Обязательное поле для заполнения',
            'img.mimes' => 'Допустимое разрешение: png, jpg, jpeg',
            'category.required' => 'Укажите категорию',
            'price.required' => 'Обязательное поле для заполнения',
            'price.numeric' => 'Поле должно быть числовым',
            'count.required' => 'Обязательное поле для заполнения',
            'count.numeric' => 'Поле должно быть числовым',
            'count.between' => 'Поле должно содержать числа от 0 до 1000000',
        ]);


        $path_img = '';
        if ($request->file('img')){
            $path_img = $request->file('img')->store('public/img');
        }

        $product->title = $request->title;
        $product->categry_id = $request->category;
        $product->img = '/storage/' . $path_img;
        $product->age = $request->age;
        $product->antagonist = $request->antagonist;
        $product->price = $request->price;
        $product->count = $request->count;

        $product->update();

        return redirect()->route('catalogPage');
    }


}
