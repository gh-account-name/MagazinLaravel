@extends('layout.app')

@section('title')
    Регистрация
@endsection

@section('main')
    <div class="container" id="regApp">
        <div class="row justify-content-center"><h2 class="text-center m-5">Регистрация</h2></div>
        <div class="row justify-content-center">
            <form class="col-5" id="form" method="post" action="{{route('register')}}">
                @csrf
                @method('post')
                <div class="mb-3">
                    <label for="name" class="form-label">Имя</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{old('name')}}" name="name">
                    <div class="invalid-feedback">
                        @error('name')
                            {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="surname" class="form-label">Фамилия</label>
                    <input type="text" class="form-control @error('surname') is-invalid @enderror" id="surname" value="{{old('surname')}}" name="surname">
                    <div class="invalid-feedback">
                        @error('surname')
                            {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="patronymic" class="form-label">Отчество</label>
                    <input type="text" class="form-control @error('patronymic') is-invalid @enderror" id="patronymic" value="{{old('patronymic')}}" name="patronymic">
                    <div class="invalid-feedback">
                        @error('patronymic')
                            {{$message}}
                        @enderror
                    </div>
                </div>
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
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{old('email')}}" name="email">
                    <div class="invalid-feedback">
                        @error('email')
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
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Повторение пароля</label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation">
                    <div class="invalid-feedback">
                        @error('password_confirmation')
                            {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="rules @error('rules') is-invalid @enderror" id="rules" name="rules">
                    <label class="form-check-label" for="rules">Согласие на обработку данных</label>
                    <div class="invalid-feedback">
                        @error('rules')
                        {{$message}}
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary col-5" style="margin-left: 50%; transform: translateX(-50%)">Регистрация</button>
            </form>
        </div>
    </div>
@endsection

