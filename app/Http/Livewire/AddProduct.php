<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddProduct extends Component
{
    use WithFileUploads;

    public $name, $price, $weight, $image;

    public function mount()
    {
        if(Auth::user()){
            if(Auth::user()->level !== 1){
                return redirect('');
            }
        }
    }

    public function store() 
    {
        $this->validate(
            [
                'name' => 'required',
                'price' => 'required',
                'weight' => 'required',
                'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:2048',
            ]
        );

        $image_name = md5($this->image . microtime()) . '.' . $this->image->extension();
        Storage::disk('public')->putFileAs('photos', $this->image, $image_name);

        Product::create(
            [
                'product_name' => $this->name,
                'price' => $this->price,
                'weight' => $this->weight,
                'image' => $image_name
            ]
        );

        return redirect('');
    }

    public function render()
    {
        return view('livewire.add-product')->extends('_layouts.app')->section('content');
    }
}
