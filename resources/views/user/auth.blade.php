@extends('layout.app')

@section('title')
    Авторизация
@endsection

@section('main')
    <div class="container" id="regApp">
        <div class="row justify-content-center"><h2 class="text-center m-5">Авторизация</h2></div>
        @if(session()->has('success'))
            <div class="container col-4">
                <div class="alert text-center alert-success">
                    {{session('success')}}
                </div>
            </div>
        @endif

        @if(session()->has('error'))
            <div class="col-12 d-flex justify-content-center">
                <div class="alert text-center alert-danger">
                    {{session('error')}}
                </div>
            </div>
        @endif

        <div class="row justify-content-center">
            <form class="col-5" id="form" method="post" action="{{route('auth')}}">
                @csrf
                @method('post')
                <div class="mb-3">
                    <label for="login" class="form-label">Логин</label>
                    <input type="text" class="form-control @error('login') is-invalid @enderror" id="login" value="{{old('login')}}" name="login">
                    <div class="invalid-feedback">
                        @error('login')
                        {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Пароль</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
                    <div class="invalid-feedback">
                        @error('password')
                        {{$message}}
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary col-5 mt-5" style="margin-left: 50%; transform: translateX(-50%)">Войти</button>
            </form>
        </div>
    </div>
@endsection


