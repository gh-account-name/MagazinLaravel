@extends('layout.app')

@section('title')
    Категории
@endsection

@section('main')
    <style>
        table{
            color: white !important;
        }
    </style>

    <div class="container d-flex flex-column align-items-center">
        <h2 class="mt-5">Создать категорию</h2>
        <form action="{{route('addCategory')}}" style="padding: 40px;" class="col-4" method="post">
            @csrf
            @method('post')
            <div class="mb-3">
                <label for="title" class="form-label">Название категории</label>
                <input class="form-control" type="text" id="title" name="title" required>
            </div>
            <div class="row justify-content-center"><button type="submit" class="col-5 btn btn-primary mt-3">Создать</button></div>
        </form>
    </div>

    <div class="d-flex justify-content-center flex-column align-items-center m-5">
        <h2 class="m-5">Категории</h2>
        <div class="categoriesTable col-8">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Название</th>
                    <th scope="col" class="col-3 text-center">Действие</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $key => $category)
                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$category->title}}</td>
                        <td class="d-flex justify-content-sm-around">
                            <a href="{{route('editCategoryPage', ['category'=>$category])}}"><button type="button" class="btn btn-success">Редактировать</button></a>
                            <form action="{{route('deleteCategory', ['category'=>$category])}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
