<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Home extends Component
{
    public $products = [];
    
    public function buy($id)
    {
        if(!Auth::user()){
            return redirect('login');
        }

        $product = Product::find($id);

        Order::create(
            [
                'user_id' => Auth::user()->id,
                'product_id' => $product->id,
                'total_price' => $product->price,
                'status' => 0
            ]
        );

        return redirect('checkout');
    }

    public function render()
    {
        $this->products = Product::all();

        return view('livewire.home')->extends('_layouts.app')->section('content');
    }
}
