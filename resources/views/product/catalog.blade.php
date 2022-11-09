@extends('layout.app')

@section('title')
    Каталог
@endsection

@section('main')
    <div class="container">
        <h1 class="text-center mt-5">Каталог</h1>
        <div class="products d-flex flex-wrap">
            @foreach($products->reverse() as $key=>$product)
                <a href="#" style="text-decoration: none;" >
                    <div class="productCard" style="display: flex; flex-direction: column; width: 350px; height: 300px; padding: 20px; border-radius: 20px ; align-items: center; margin-top:50px ;box-shadow: 2px 2px 5px gray">
                        <img style="height: 200px" src="{{$product->img}}" alt="product">
                        <p style="font-size: 18px; font-weight: bold; color: black;">{{$product->name}} {{$key}}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection