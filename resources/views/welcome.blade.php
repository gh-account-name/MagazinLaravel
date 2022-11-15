@extends('layout.app')

@section('title')
    Главная
@endsection

@section('main')
    <div class="container">
        <h1 class="text-center m-4">Главная</h1>
        <p class="text-center h4 mb-4">Новые товары уже доступны!</p>
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                @foreach ($lastProducts as $key=>$product)
                <div class="carousel-item {{$key==0?'active':''}}" style="background-size: cover; height: 70vh">
                    <img src="{{asset($product->img)}}" class="d-block h-100 img-fluid" style="object-fit: cover; margin: 0 auto;" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 style="text-shadow: 0.1em 0.1em 0.1em black">First slide label</h5>
                        <p style="text-shadow: 0.1em 0.1em 0.1em black">Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                @endforeach
                {{-- <div class="carousel-item active" style="background-size: cover; height: 70vh">
                    <img src="https://www.online-tech-tips.com/wp-content/uploads/2021/08/comics1.jpeg" class="d-block h-100 img-fluid" style="object-fit: cover; margin: 0 auto;" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 style="text-shadow: 0.1em 0.1em 0.1em black">First slide label</h5>
                        <p style="text-shadow: 0.1em 0.1em 0.1em black">Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item" style="background-size: cover; height: 70vh">
                    <img src="https://img.freepik.com/free-vector/comic-bright-strips-with-explosive-halftone-rays_225004-801.jpg?w=2000" class="d-block h-100 img-fluid"  style="object-fit: cover; margin: 0 auto;" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 style="text-shadow: 0.1em 0.1em 0.1em black">Second slide label</h5>
                        <p style="text-shadow: 0.1em 0.1em 0.1em black">Some representative placeholder content for the second slide.</p>
                    </div>
                </div>
                <div class="carousel-item" style="background-size: cover; height: 70vh">
                    <img src="https://comic-attack.de/wp-content/uploads/2020/07/photo_2020-07-16_14-29-12.jpg" class="d-block h-100 img-fluid" style="object-fit: cover; margin: 0 auto;"  alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 style="text-shadow: 0.1em 0.1em 0.1em black">Third slide label</h5>
                        <p style="text-shadow: 0.1em 0.1em 0.1em black">Some representative placeholder content for the third slide.</p>
                    </div>
                </div> --}}
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
@endsection
