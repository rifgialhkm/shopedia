<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Checkout extends Component
{
    public $orders = [];

    public function mount()
    {
        if(!Auth::user()){
            return redirect('login');
        }
    }

    public function destroy($order_id)
    {
        $order = Order::find($order_id);
        $order->delete();
    }

    public function render()
    {
        if(Auth::user()){
            $this->orders = Order::where('user_id', Auth::user()->id)->get();
        }

        return view('livewire.checkout')->extends('_layouts.app')->section('content');
    }
}
