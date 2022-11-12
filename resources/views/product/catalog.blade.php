@extends('layout.app')

@section('title')
    Каталог
@endsection

@section('main')

    <style>
        @media (max-width: 1400px) {
            .sort-filter{
                width: 50%;
            }
        }

        @media (max-width: 1200px) {
            .sort-filter{
                width: 60%;
            }
        }

        @media (max-width: 991px) {
            .sort-filter{
                width: 75%;
            }
        }

        @media (max-width: 768px) {
            .sort-filter>form{
                /*display: block !important;*/
                height: 220px;
                flex-direction: column;
                width: 50% !important;
            }
            .sort-filter>form>button{
                transform: none !important;
                height: 50px !important;
                width: 120px !important;
                align-self: center;
            }
            /*.sort-filter>form>span{*/
            /*    margin-bottom: 50px !important;*/
            /*}*/
            .sort-filter{
                width: 100%;
                justify-content: center!important;
            }
        }
    </style>

    <div class="container">
        <h1 class="text-center mt-5">Каталог</h1>

        <div class="sort-filter d-flex justify-content-between col-5" style="margin-bottom: 100px">
            <form class="filter d-flex justify-content-between w-100" action="{{route('catalogPage')}}">
                <span>
                    <label for="category">Фильтрация по категориям:</label>
                    <select id="category" name="category" class="form-select">
                        <option value="0">Все</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                    </select>
                </span>
{{--                <button type="submit" class="btn btn-primary mt-5">Применить</button>--}}
{{--            </form>--}}

{{--            <form class="sort" action="{{route('sort')}}">--}}
                <span>
                    <label for="parameter">Сортировка по:</label>
                    <select id="parameter" name="parameter" class="form-select">
                        <option value="">Нет</option>
                        <option value="title">Наименованию</option>
                        <option value="price">Цене</option>
                        <option value="count">Количеству</option>
                    </select>
                </span>
                <button type="submit" class="btn btn-primary" style="transform: translateY(50%); height:70%">Применить</button>
            </form>
        </div>

        <div class="products row row-cols-1 row-cols-md-3 g-5">
            @foreach($products as $key=>$product)
                <div class="col d-flex justify-content-center">
{{--                    <a href="#" class="card" style="text-decoration: none; display: flex; background-color: white; flex-direction: column; width: 280px; height:380px; padding: 20px; border-radius: 20px ; align-items: center; margin-top:50px ;box-shadow: 2px 2px 5px black">--}}
{{--                        <img style="height: 80%;" src="{{$product->img}}" alt="product" >--}}
{{--                        <p style="font-size: 18px; font-weight: bold; color: black; margin: 0" class=" text-center mt-2">{{$product->title}}</p>--}}
{{--                        <p style="font-size: 18px; font-weight: bold; color: black; margin: 0" class="text-center">{{$product->price}} р.</p>--}}
{{--                    </a>--}}
                    <a href="#" class="card" style="width: 300px; box-shadow: 0px 0px 10px black; text-decoration: none">
                        <img src="{{$product->img}}" class="card-img-top" alt="..." style="height: 100%">
                        <div class="card-body" style="position: relative">
                            <h5 class="card-title text-center text-black" style="height: 50px">{{$product->title}}</h5>
                            <p class="card-text text-black">{{$product->price}} руб.</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <div class="pagination-links d-flex justify-content-center mt-5">
            {{$products->links('vendor.pagination.bootstrap-4')}}
        </div>
    </div>
@endsection
