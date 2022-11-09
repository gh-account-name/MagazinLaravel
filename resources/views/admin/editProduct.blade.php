@extends('layout.app')

@section('title')
    Редактировать товар
@endsection

@section('main')
    <div class="container d-flex flex-column align-items-center">
        <<h2 class="mt-5">Редактировать товар</h2>
        <form action="{{route('updateProduct', ['product'=>$product])}}" style="padding: 40px;" class="col-6" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="title" class="form-label">Название</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{$product->title}}">
                <div class="invalid-feedback">
                    @error('title')
                    {{$message}}
                    @enderror
                </div>
            </div>

            <select id="category" name="category" class="form-select @error('category') is-invalid @enderror mb-3 mt-4" aria-label="Default select example">
                <option disabled>Категория</option>
                @foreach($categories as $category)
                    <option @if($category->id === $product->id) selected @endif value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">
                @error('category')
                {{$message}}
                @enderror
            </div>

            <div class="mb-3">
                <label for="img" class="form-label">Картинка</label>
                <input type="file" class="form-control @error('img') is-invalid @enderror" id="img" name="img" value="{{$product->img}}">
                <div class="invalid-feedback">
                    @error('img')
                    {{$message}}
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="age" class="form-label">Дата издания</label>
                <input class="form-control @error('age') is-invalid @enderror" type="date" id="age" name="age" value="{{$product->age}}">
                <div class="invalid-feedback">
                    @error('age')
                    {{$message}}
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="antagonist" class="form-label">Антагонист</label>
                <input class="form-control @error('antagonist') is-invalid @enderror" type="text" id="antagonist" name="antagonist" value="{{$product->antagonist}}">
                <div class="invalid-feedback">
                    @error('antagonist')
                    {{$message}}
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Цена</label>
                <input class="form-control @error('price') is-invalid @enderror" type="number" id="price" name="price" value="{{$product->price}}">
                <div class="invalid-feedback">
                    @error('price')
                    {{$message}}
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="count" class="form-label">Количество товара в наличии</label>
                <input class="form-control @error('count') is-invalid @enderror" type="number" id="count" name="count" value="{{$product->count}}">
                <div class="invalid-feedback">
                    @error('count')
                    {{$message}}
                    @enderror
                </div>
            </div>

            <div class="row justify-content-center"><button type="submit" class="col-5 btn btn-primary mt-3">Редактировать</button></div>
        </form>
    </div>
@endsection
