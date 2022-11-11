@extends('layout.app')

@section('title')
    Каталог
@endsection

@section('main')
    <div class="container">
        <h1 class="text-center mt-5">Каталог</h1>

        <div class="sort-filter d-flex justify-content-between col-4">
            <form class="filter" action="{{route('sort_filter')}}">
                <label for="category">Фильтрация по категориям:</label>
                <select id="category" name="category" class="form-select">
                    <option value="0">Все</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
{{--                <button type="submit" class="btn btn-primary mt-5">Применить</button>--}}
{{--            </form>--}}

{{--            <form class="sort" action="{{route('sort')}}">--}}
                <label for="parameter">Сортировка по:</label>
                <select id="parameter" name="parameter" class="form-select">
                    <option value="title">Наименованию</option>
                    <option value="price">Цене</option>
                    <option value="count">Количеству</option>
                </select>
                <button type="submit" class="btn btn-primary mt-5">Применить</button>
            </form>
        </div>

        <div class="products row row-cols-1 row-cols-md-3 g-4">
            @foreach($products as $key=>$product)
                <div class="col d-flex justify-content-center">
                    <a href="#" class="card" style="text-decoration: none; display: flex; background-color: white; flex-direction: column; width: 280px; height: 350px; padding: 20px; border-radius: 20px ; align-items: center; margin-top:50px ;box-shadow: 2px 2px 5px black">
                        <img style="height: 80%;" src="{{$product->img}}" alt="product" >
                        <p style="font-size: 18px; font-weight: bold; color: black; margin: 0" class=" text-center mt-2">{{\Illuminate\Support\Str::words($product->title, 4)}}</p>
                        <p style="font-size: 18px; font-weight: bold; color: black; margin: 0" class="text-center">{{$product->price}} р.</p>
                    </a>
                </div>
            @endforeach
        </div>

        <div class="pagination-links d-flex justify-content-center mt-5">
            {{$products->links('vendor.pagination.bootstrap-4')}}
        </div>
    </div>
@endsection
