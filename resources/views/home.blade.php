@extends('_layouts.app')

@section('title', 'Home')

@section('css')
<style>
    .carousel img {
        border-radius: 10px;
    }
</style>
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="card">
                    <div id="carouselExampleIndicators3" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators3" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators3" data-slide-to="1"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="{{ asset('assets/img/news/img20.jpg') }}" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('assets/img/news/img21.jpg') }}" alt="Second slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators3" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators3" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            <h2 class="section-title">Rekomendasi untukmu</h2>
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                        <product class="product product-style-b">
                            <div class="product-header">
                                <a href="">
                                    <div class="product-image" data-background="{{ asset('assets/img/products/product-1.jpg') }}">
                                    </div>
                                </a>
                            </div>
                            <div class="product-details">
                                <div class="product-title">
                                    <h2><a href="#">Laptop Acer Aspire 5</a></h2>
                                </div>
                                <p>Rp. 6.500.000</p>
                                <div class="product-cta">
                                    <a href="#" class="btn btn-primary">Beli</a>
                                </div>
                            </div>
                        </product>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                        <product class="product product-style-b">
                            <div class="product-header">
                                <div class="product-image" data-background="{{ asset('assets/img/products/product-3.jpg') }}">
                                </div>
                            </div>
                            <div class="product-details">
                                <div class="product-title">
                                    <h2><a href="#">Excepteur sint occaecat cupidatat non proident</a></h2>
                                </div>
                                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. </p>
                                <div class="product-cta">
                                    <a href="#">Read More <i class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </product>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                        <product class="product product-style-b">
                            <div class="product-header">
                                <div class="product-image" data-background="{{ asset('assets/img/products/product-4.jpg') }}">
                                </div>
                            </div>
                            <div class="product-details">
                                <div class="product-title">
                                    <h2><a href="#">Excepteur sint occaecat cupidatat non proident</a></h2>
                                </div>
                                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. </p>
                                <div class="product-cta">
                                    <a href="#">Read More <i class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </product>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                        <product class="product product-style-b">
                            <div class="product-header">
                                <div class="product-image" data-background="{{ asset('assets/img/products/product-5.jpg') }}">
                                </div>
                            </div>
                            <div class="product-details">
                                <div class="product-title">
                                    <h2><a href="#">Excepteur sint occaecat cupidatat non proident</a></h2>
                                </div>
                                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. </p>
                                <div class="product-cta">
                                    <a href="#">Read More <i class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </product>
                    </div>
                </div>
        </section>
    </div>
@endsection