@section('title', 'Checkout')

<div class="main-content">
    <section class="section">
        <div class="section-body">
            <h2 class="section-title">Checkout</h2>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal Pesan</th>
                                            <th>Gambar Produk</th>
                                            <th>Nama Produk</th>
                                            <th>Status</th>
                                            <th>Total Harga</th>
                                            <th>Aksi</th>
                                            <th>Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1 ?>
                                        @forelse($orders as $order)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $order->created_at }}</td>
                                                <td>
                                                    <?php $product = \App\Models\Product::where('id', $order->product_id)->first(); ?>
                                                    <img src="{{ asset('storage/photos/'.$product->image) }}" alt="product" style="width: 100px;">
                                                </td>
                                                <td>{{ $product->product_name }}</td>
                                                <td>
                                                    @if($order->status == 0)
                                                        <strong>Pesanan belum dibayar</strong>
                                                    @endif
                                                    @if($order->status == 1)
                                                        <strong>Pesanan sedang diproses</strong>
                                                    @endif
                                                </td>
                                                <td><strong>Rp. {{ number_format($order->total_price) }}</strong></td>
                                                <td>
                                                    @if($order->status == 0)
                                                        <a href="{{ url('bayar/'.$order->id) }}" class="btn btn-success">Pilih pembayaran</a>
                                                    @endif
                                                    @if($order->status == 1)
                                                        <a href="{{ url('bayar/'.$order->id) }}" class="btn btn-info">Lihat Status</a>
                                                    @endif
                                                </td>
                                                <td><button class="btn btn-danger" wire:click="destroy({{ $order->id }})">Hapus</button></td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8">Tidak ada pesanan</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
