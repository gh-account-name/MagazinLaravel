@extends('layout.app')

@section('title')
    Мои заказы
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

        .buttons button {
            font-size: 0.7rem;
            padding: 0.3rem 0.5rem;
        }

        /* .pmform{
            width: 40px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
        } */

    </style>

    <div class="container pt-5">

        @if(session()->has('success'))
            <div class="d-flex justify-content-center mt-4">
                <div class="alert text-center alert-success col-4">
                    {{session('success')}}
                </div>
            </div>
        @endif

        @if(session()->has('alert'))
            <div class="d-flex justify-content-center mt-4">
                <div class="alert text-center alert-warning col-4">
                    {{session('alert')}}
                </div>
            </div>
        @endif

        <div class="d-flex justify-content-center flex-column align-items-center col-12">
            <h2>Мои заказы</h2>
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
                        <div class="col-3">Стоимость</div>
                        <div class="col-3">Кол-во товаров</div>
                        <div class="col-3">Статус</div>
                        <div class="col-2">Действие</div>
                    </div>
                    @foreach($orders as $order)
                        <div class="tbody row">
                            <div class="col-1 d-flex align-items-center justify-content-center" style="font-weight: bold">{{$order->id}}</div>
                            <div class="col-3 d-flex align-items-center" style="font-weight: bold">{{$order->summ}} руб.</div>
                            <div class="col-3 d-flex align-items-center" style="font-weight: bold;">{{$order->cart_sum_count}}</div>
                            <div class="col-3 d-flex align-items-center
                                @if($order->status == 'подтверждён') text-success @endif
                                 @if($order->status == 'в обработке') text-warning @endif
                                 @if($order->status == 'отклонён') text-danger @endif"
                                 style="font-weight: bold">
                                {{$order->status}}</div>
                            <div class="col-2 buttons d-flex align-items-center justify-content-between">
                                <form action="{{route('cancelOrder', ['order'=>$order])}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn @if($order->status == 'подтверждён') disabled @endif btn-danger">Отменить</button>
                                </form>
                                <a href="{{route('orderDetailsPage', ['order'=>$order])}}"><button type="submit" class="btn  btn-dark">Подробнее</button></a>
                            </div>
                        </div>
                    @endforeach

                    @if (count($orders)==0)
                        <div class="mt-5">
                            <p class="h4 text-center">Заказов нет</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>
@endsection
