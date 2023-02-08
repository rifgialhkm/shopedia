@section('title', 'Bayar')

<div class="main-content">
    <section class="section">
        <div class="section-body">
            <h2 class="section-title">Bayar Pesanan</h2>
        </div>
        @if($order->status == 0)
            <div class="row">
                <div class="col-12">
                    <button id="pay-button" type="button" class="btn btn-primary">Bayar</button>
                </div>
            </div>
        @elseif($order->status == 1)
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-md">
                                    @if($payment_type == "bank_transfer")
                                        <tr>
                                            <td>Metode Pembayaran</td>
                                            <td>:</td>
                                            <td>Bank Transfer</td>
                                        </tr>
                                        <tr>
                                            <td>Virtual Akun</td>
                                            <td>:</td>
                                            <td>{{ $va_number }}</td>
                                        </tr>
                                        <tr>
                                            <td>Bank</td>
                                            <td>:</td>
                                            <td>{{ $bank }}</td>
                                        </tr>
                                    @elseif($payment_type == "cstore")
                                        <tr>
                                            <td>Metode Pembayaran</td>
                                            <td>:</td>
                                            <td>Indomaret</td>
                                        </tr>
                                        <tr>
                                            <td>Kode Pembayaran</td>
                                            <td>:</td>
                                            <td>{{ $payment_code }}</td>
                                        </tr>
                                    @elseif($payment_type == "gopay" || $payment_type == "qris")
                                    <tr>
                                            <td>Metode Pembayaran</td>
                                            <td>:</td>
                                            <td>QRIS</td>
                                        </tr>
                                        <tr>
                                            <td>Kode Pembayaran</td>
                                            <td>:</td>
                                            <td>
                                                @if($payment_type == "gopay")
                                                    <img src="https://api.sandbox.midtrans.com/v2/gopay/{{ $transaction_id }}/qr-code" alt="barcode" width="100px">
                                                @else
                                                    <img src="https://api.sandbox.midtrans.com/v2/qris/shopeepay/sppq_{{ $transaction_id }}/qr-code" alt="barcode" width="100px">
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td>Total Harga</td>
                                        <td>:</td>
                                        <td>{{ $gross_amount }}</td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>:</td>
                                        <td>{{ $transaction_status }}</td>
                                    </tr>
                                    <tr>
                                        <td>Batas Waktu Pembayaran</td>
                                        <td>:</td>
                                        <td>{{ $deadline }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </section>
</div>
<form action="Payment" id="payment-form" method="GET">
    <input type="hidden" name="result_data" id="result-data" value="">
</form>

@section('scripts')
<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-_eqPW_8007lYxvob"></script>
<script>
    document.getElementById('pay-button').onclick = function(){
        var resultType = document.getElementById('result-type');
        var resultData = document.getElementById('result-data')
        function changeResult(type,data){
            $('#result-type').val(type);
            $('#result-data').val(JSON.stringify(data));
        }

        snap.pay('<?=$snapToken?>', {
            onSuccess: function(result){
                changeResult('success', result);
                console.log(result.status_message);
                console.log(result);
                $("#payment-form").submit();
            },
            onPending: function(result){
                changeResult('pending', result);
                console.log(result.status_message);
                $("#payment-form").submit();
            },
            onError: function(result){
                changeResult('error', result);
                console.log(result.status_message);
                $("#payment-form").submit();
            }
        });
    };
</script>
@endsection
