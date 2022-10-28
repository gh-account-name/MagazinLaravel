@extends('layout.app')

@section('title')
    Главная
@endsection

@section('main')
    <div class="container">
        <h1 class="text-center m-5">Главная</h1>
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" style="background-size: cover; height: 70vh">
                    <img src="https://gl-img.rg.ru/uploads/images/2017/04/26/e0637ce8b741104.jpg" class="d-block w-100 h-100 img-fluid" style="object-fit: cover" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item" style="background-size: cover; height: 70vh">
                    <img src="https://st2.depositphotos.com/1007566/7585/v/450/depositphotos_75850957-stock-illustration-comics-design.jpg" class="d-block w-100 h-100 img-fluid"  style="object-fit: cover" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                </div>
                <div class="carousel-item" style="background-size: cover; height: 70vh">
                    <img src="https://st.depositphotos.com/1008402/4027/i/950/depositphotos_40277299-stock-photo-cute-retro-woman-in-comics.jpg" class="d-block w-100 h-100 img-fluid" style="object-fit: cover"  alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div>
                </div>
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
