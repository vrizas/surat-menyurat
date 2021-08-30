<?php

namespace App\Http\Livewire;

use App\Models\Village;
use Livewire\Component;

class InputDataKelurahan extends Component
{
    public $ttdRt;
    public $ttdRw;

    public function render()
    {
        return view('livewire.input-data-kelurahan');
    }

    
}
