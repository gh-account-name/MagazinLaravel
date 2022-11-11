@extends('layout.app')

@section('title')
    Продукты
@endsection

@section('main')
<div class="container d-flex flex-column align-items-center">
    <h2 class="mt-5">Добавить продукт</h2>
    <form action="{{route('addProduct')}}" style="padding: 40px;" class="col-6" method="post" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div class="mb-3">
            <label for="title" class="form-label">Название</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title')}}">
            <div class="invalid-feedback">
                @error('title')
                {{$message}}
                @enderror
            </div>
        </div>

        <select id="category" name="category" class="form-select @error('category') is-invalid @enderror mt-4" aria-label="Default select example">
            <option selected disabled>Категория</option>
            @foreach($categories as $category)
                <option @if(old('category')==$category->id) selected @endif value="{{$category->id}}">{{$category->title}}</option>
            @endforeach
        </select>
        <div class="invalid-feedback">
            @error('category')
            {{$message}}
            @enderror
        </div>

        <div class="mb-3 mt-3">
            <label for="img" class="form-label">Картинка</label>
            <input type="file" class="form-control @error('img') is-invalid @enderror" id="img" name="img">
            <div class="invalid-feedback">
                @error('img')
                {{$message}}
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="age" class="form-label">Дата издания</label>
            <input class="form-control @error('age') is-invalid @enderror" type="date" id="age" name="age" value="{{old('age')}}" >
            <div class="invalid-feedback">
                @error('age')
                {{$message}}
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="antagonist" class="form-label">Антагонист</label>
            <input class="form-control @error('antagonist') is-invalid @enderror" type="text" id="antagonist" name="antagonist" value="{{old('antagonist')}}" >
            <div class="invalid-feedback">
                @error('antagonist')
                {{$message}}
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Цена</label>
            <input class="form-control @error('price') is-invalid @enderror" type="text" id="price" name="price" value="{{old('price')}}" >
            <div class="invalid-feedback">
                @error('price')
                {{$message}}
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="count" class="form-label">Количество товара в наличии</label>
            <input class="form-control @error('count') is-invalid @enderror" type="number" id="count" name="count" value="{{old('count')}}" >
            <div class="invalid-feedback">
                @error('count')
                {{$message}}
                @enderror
            </div>
        </div>

        <div class="row justify-content-center"><button type="submit" class="col-5 btn btn-primary mt-3">Добавить</button></div>
    </form>
</div>

<div class="container">
    <h1 class="text-center mt-5">Товары</h1>
    <div class="products row row-cols-1 row-cols-md-3 g-4">
        @foreach($products as $key=>$product)
            <div class="col d-flex justify-content-center">
                <div href="#" class="card" style="text-decoration: none; display: flex; background-color: white; flex-direction: column; width: 280px; min-height: 350px; padding: 20px; border-radius: 20px ; align-items: center; margin-top:50px ;box-shadow: 2px 2px 5px black">
                    <img style="height: 80%;" src="{{$product->img}}" alt="product" class="card-img">
                    <a href="#" style="font-size: 18px; font-weight: bold; color: black; margin: 0; text-decoration:none" class=" text-center mt-2">{{$product->title}}</a>
                    <p style="font-size: 18px; font-weight: bold; color: black; margin: 0" class="text-center">{{$product->price}} р.</p>
                    <div class="buttons d-flex justify-content-between mt-3 w-100">
                        <a href="{{route('editProductPage', ['product'=>$product])}}"><button type="button" class="btn btn-warning" style="font-size: 12px">Редактировать</button></a>
                        <form action="{{route('deleteProduct', ['product'=>$product])}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger" style="font-size: 12px">Удалить</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
