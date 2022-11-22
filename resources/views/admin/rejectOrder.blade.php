@extends('layout.app')

@section('title')
    Отменить заказ
@endsection

@section('main')
    <div class="container">
        <h1 class="text-center mt-5">Отмена заказа №{{$order->id}}</h1>
        <div class="row justify-content-center mt-5">
            <form class="col-5" id="form" method="post" action="{{route('rejectOrder', ['order'=>$order])}}">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="comment" class="form-label">Комментарий</label>
                    <textarea class="form-control @error('login') is-invalid @enderror" id="comment" name="comment" placeholder="Объясните причину, по которой заказ был отменён"></textarea>
                    <div class="invalid-feedback">
                        @error('login')
                        {{$message}}
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary col-5 mt-5" style="margin-left: 50%; transform: translateX(-50%)">Отклонить заказ</button>
            </form>
        </div>
    </div>
@endsection