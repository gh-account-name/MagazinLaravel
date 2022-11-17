@extends('layout.app')

@section('title')
    {{$product->title}}
@endsection

@section('main')

    <style>
        /* .image{
            height: 50vh;
            display: flex;
            justify-content: center;
        }

        .image img{
            height: inherit;
        } */

        .details button {
            /* color: #ffc107 !important;
            background-color: #212529 !important;
            border-color: #212529 !important; */
            padding: 0.5rem 15% !important;
        }
    </style>

    <div class="container">
        <h1 class="text-center mt-5">{{$product->title}}</h1>
        <div class="content d-flex justify-content-between mt-5" style="padding: 0 10% 0 10%">
            <div class="image col-4 p-1" style="border: 0.4rem rgb(33,37,41) solid; border-radius: .5rem; height:fit-content">
                <img class="col-12" src="{{$product->img}}" alt="product">
            </div>
            <div class="details col-6" style="font-size: 24px">
                <p>Цена: {{$product->price}} руб.</p>
                <p>Категория: {{$product->categry->title}}</p>
                @if ($product->age)
                    <p>Дата публикции: {{$product->age}}</p>
                @endif
                @if ($product->antagonist)
                    <p>Антагонист: {{$product->antagonist}}</p>
                @endif
                <p>Осталось в наличии: {{$product->count}} шт.</p>
                <button type="button" class="btn btn-primary btn-lg mt-3">Купить</button>
            </div>
        </div>
    </div>
    
@endsection