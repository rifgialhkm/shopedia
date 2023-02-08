<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PayOrder extends Component
{
    public $snapToken;
    public $order;
    public $payment_type, $va_number, $payment_code, $transaction_id, $gross_amount, $bank, $transaction_status, $deadline;

    public function mount($id)
    {
        if(!Auth::user()){
            return redirect('login');
        }

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-udFzxh23bqg1oA1tvF1QalSj';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        if(isset($_GET['result_data'])){
            $current_status = json_decode($_GET['result_data'], true);
            // dd($current_status);
            $order_id = $current_status['order_id'];
            $this->order = Order::where('id', $order_id)->first();
            $this->order->status = 1;
            $this->order->update();
        } else {
            $this->order = Order::find($id);
        }

        $splitName = explode(' ', Auth::user()->name, 2);

        $first_name = $splitName[0];
        $last_name = !empty($splitName[1]) ? $splitName[1] : '';

        if(!empty($this->order)){
            // $orderId = 'SPD-'.str_pad($this->order->id + 1, 8, "0", STR_PAD_LEFT);
            if($this->order->status == 0){
                $params = array(
                    'transaction_details' => array(
                        'order_id' => $this->order->id,
                        'gross_amount' => $this->order->total_price,
                    ),
                    'customer_details' => array(
                        'first_name' => $first_name,
                        'last_name' => $last_name,
                        'email' => Auth::user()->email,
                        'phone' => '08111222333',
                    ),
                );
                $this->snapToken = \Midtrans\Snap::getSnapToken($params);
            } elseif ($this->order->status == 1) {
                $status = \Midtrans\Transaction::status($this->order->id);
                $status = json_decode(json_encode($status), true);
                $payment_type = $status['payment_type'];

                if($payment_type == "bank_transfer"){
                    $this->payment_type = $status['payment_type'];
                    $this->va_number = $status['va_numbers'][0]['va_number'];
                    $this->gross_amount = $status['gross_amount'];
                    $this->bank = $status['va_numbers'][0]['bank'];
                    $this->transaction_status = $status['transaction_status'];
                    $transaction_time = $status['transaction_time'];
                    $this->deadline = date('Y-m-d H:i:s', strtotime('+1 day', strtotime($transaction_time)));
                } elseif ($payment_type == "cstore") {
                    $this->payment_type = $status['payment_type'];
                    $this->payment_code = $status['payment_code'];
                    $this->gross_amount = $status['gross_amount'];
                    $this->transaction_status = $status['transaction_status'];
                    $transaction_time = $status['transaction_time'];
                    $this->deadline = date('Y-m-d H:i:s', strtotime('+1 day', strtotime($transaction_time)));
                } elseif ($payment_type == "gopay" || $payment_type == "qris") {
                    $this->payment_type = $status['payment_type'];
                    $this->transaction_id = $status['transaction_id'];
                    $this->gross_amount = $status['gross_amount'];
                    $this->transaction_status = $status['transaction_status'];
                    $transaction_time = $status['transaction_time'];
                    $this->deadline = date('Y-m-d H:i:s', strtotime('+1 day', strtotime($transaction_time)));
                }

            }
        }
    }

    public function render()
    {
        return view('livewire.pay-order')->extends('_layouts.app')->section('content');
    }
}
