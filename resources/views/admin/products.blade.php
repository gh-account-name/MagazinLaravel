@extends('layout.app')

@section('title')
    Продукты
@endsection

@section('main')
<div class="container d-flex flex-column align-items-center">
    <h2 class="mt-5">Добавить продукт</h2>
    <form action="{{route('addProduct')}}" style="padding: 40px;" class="col-6" method="post">
        @csrf
        @method('post')
        <div class="mb-3">
            <label for="title" class="form-label">Название</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <select id="category" name="category" class="form-select mb-3 mt-4" aria-label="Default select example">
            <option selected disabled>Категория</option>
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->title}}</option>
            @endforeach
        </select>
        <div class="mb-3">
            <label for="img" class="form-label">Картинка</label>
            <input type="file" class="form-control" id="img" name="img">
        </div>
        
        <div class="mb-3">
            <label for="age" class="form-label">Дата издания</label>
            <input class="form-control" type="date" id="age" name="age" required>
        </div>
        <div class="mb-3">
            <label for="antagonist" class="form-label">Антагонист</label>
            <input class="form-control" type="text" id="antagonist" name="antagonist" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Цена</label>
            <input class="form-control" type="number" id="price" name="price" required>
        </div>
        <div class="mb-3">
            <label for="count" class="form-label">Количество товара в наличии</label>
            <input class="form-control" type="number" id="count" name="count" required>
        </div>
        <div class="row justify-content-center"><button type="submit" class="col-5 btn btn-primary mt-3">Добавить</button></div>
    </form>
</div>

@endsection