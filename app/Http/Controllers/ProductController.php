<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function addProduct(Request $request){
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


}
