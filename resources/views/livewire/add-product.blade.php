@section('title', 'Tambah Produk')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="features-posts.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Tambah Produk</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Home</a></div>
                <div class="breadcrumb-item">Tambah Produk</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Tambah Produk</h2>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form wire:submit.prevent="store">
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Produk</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" wire:model="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Harga Produk</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="number" class="form-control"  wire:model="price" value="{{ old('price') }}" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Berat Produk</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="number" class="form-control"  wire:model="weight" value="{{ old('weight') }}" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar Produk</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="file" class="form-control"  wire:model="image">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button type="submit" class="btn btn-primary">Tambah Produk</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>