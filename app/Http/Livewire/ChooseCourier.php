<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class ChooseCourier extends Component
{
    public function render()
    {
        return view('livewire.choose-courier')->extends('_layouts.app')->section('content');
    }
}
