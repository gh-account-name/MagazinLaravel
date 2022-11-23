@extends('layout.app')

@section('title')
    Детали заказа
@endsection

@section('main')

    <style>
        /* tbody>tr>td{
            border-bottom-width: 0 !important;
        }

        tbody>tr{
            border-bottom: 1px #dee2e6 solid;
        } */
        .tabl>div{
            padding: 0.5rem
        }

        .tbody{
            border-bottom: 1px #dee2e6 solid;
        }

        /* .pmform{
            width: 40px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
        } */

    </style>

    <div class="container">

        <div class="d-flex justify-content-center flex-column align-items-center col-12">
            <h2 class="m-5">Детали заказа №{{$cart[0]->order_id}}</h2>
            <div class="cartTable col-10">
                {{-- <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Товар</th>
                        <th scope="col" class="col-4 text-center">Действие</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cart as $key => $item)
                        <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{asset($item->product->img)}}" alt="product" style="width:15%; margin-right: 5%">
                                    <p style="font-weight: bold; margin:0;">{{$item->product->title}}</p>
                                </div>
                            </td>
                            <td class="d-flex justify-content-sm-around">
                                <a href=""><button type="button" class="btn btn-success">Редактировать</button></a>
                                <form action="" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Удалить</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table> --}}
                <div class="tabl">
                    <div class="thead row" style="font-weight: bold; border-bottom: 3px #212529 solid">
                        <div class="col-1 text-center">#</div>
                        <div class="col-5">Товар</div>
                        <div class="col-2">Стоимость за шт.</div>
                        <div class="col-2">Количество</div>
                        <div class="col-2">Общая стоимость</div>
                    </div>
                    @foreach($cart as $key => $item)
                        <div class="tbody row">
                            <div class="col-1 d-flex align-items-center justify-content-center" style="font-weight: bold">{{$key+1}}</div>
                            <div class="col-5 d-flex align-items-center">
                                <img src="{{asset($item->product->img)}}" alt="product" style="width:15%; margin-right: 5%">
                                <a href="{{route('productPage', ['product'=>$item->product])}}"><p style="font-weight: bold; margin:0;">{{$item->product->title}}</p></a>
                            </div>
                            <div class="col-2 d-flex align-items-center" style="font-weight: bold">{{$item->product->price}} руб.</div>
                            <div class="col-2 d-flex align-items-center" style="font-weight: bold">
                                <p class="m-0 p-2">{{$item->count}}</p>
                            </div>
                            <div class="col-2 d-flex align-items-center" style="font-weight: bold">
                                {{$item->summ}} руб.
                            </div>
                        </div>
                    @endforeach

                    @if (count($cart)!=0)
                        <div class="sum mt-5">
                            <p class="h4">Итого: {{$item->order->summ}} руб.</p>
                        </div>
                    @else
                        <div class="mt-5">
                            <p class="h4 text-center">Корзина пуста</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
