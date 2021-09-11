<?php

namespace App\Http\Livewire;

use Livewire\Component;
use DB;

class TabelWarga extends Component
{
    protected $listeners = [
        'dataCreated' => '$refresh'
    ];

    public function render()
    {
        $members = DB::table('members')->get();
        return view('livewire.tabel-warga')->with('members', $members);
    }
}
