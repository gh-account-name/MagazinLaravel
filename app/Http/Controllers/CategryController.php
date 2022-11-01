<?php

namespace App\Http\Controllers;

use App\Models\Categry;
use Illuminate\Http\Request;

class CategryController extends Controller
{
    public function addCategory(Request $request){
        $category = new Categry();
        $category->title = $request->title;
        $category->save();
        return redirect()->back();
    }

    public function update(Request $request, Categry $category){
        $category->name = $request->name;
        $category->update();
        return redirect()->route('admin');
    }

    public function destroy(Categry $category){
        $category->delete();
        return redirect()->back();
    }
}
