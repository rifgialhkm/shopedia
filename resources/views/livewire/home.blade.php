@section('title', 'Home')

@section('css')
<style>
    .carousel img {
        border-radius: 10px;
    }
</style>
@endsection

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
        @if(Auth::user())
            @if(Auth::user()->level == 1)
                <div class="row mb-5">
                    <div class="col-4">
                        <a href="{{  route('addProduct') }}" class="btn btn-primary">Tambah Produk</a>
                    </div>
                </div>
            @endif
        @endif
        <div class="row">
            @foreach($products as $product)
                <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                    <product class="product product-style-b">
                        <div class="product-header">
                            <a href="">
                                <div class="product-image" data-background="{{ asset('storage/photos/'.$product->image) }}">
                                </div>
                            </a>
                        </div>
                        <div class="product-details">
                            <div class="product-title">
                                <h2><a href="#">{{ $product->product_name }}</a></h2>
                            </div>
                            <p>Rp. {{ number_format($product->price) }}</p>
                            <div class="product-cta">
                                <button class="btn btn-primary w-100" wire:click="buy({{ $product->id }})">Beli</button>
                            </div>
                        </div>
                    </product>
                </div>
            @endforeach
        </div>
    </section>
</div>
