<?php

namespace App\Http\Livewire;

use App\Models\RT;
use App\Models\RW;
use Livewire\WithFileUploads;

use Livewire\Component;

class InputDataKelurahan extends Component
{
    use WithFileUploads;

    public $tombolTambahRt = 0;
    public $tombolDeleteRt = 0;
    public $updateFormRt = 0;
    public $noRt;
    public $nikRt;
    public $namaRt;
    public $tandaTanganRt;
    public $tombolTambahRw = 0;

    protected $listeners = [
        'dataCreated' => '$refresh'
    ];

    public function render()
    {
        return view('livewire.input-data-kelurahan')->with('r_t_s', RT::get());
    }

    public function showRtForm($on) {
        $this->tombolDeleteRt = 0;
        $this->updateFormRt = 0;

        $this->noRt = '';
        $this->nikRt = '';
        $this->namaRt = '';
        $this->tandaTanganRt = '';
        $this->tombolTambahRt = $on;
    }

    public function showRwForm($on) {
        $this->tombolTambahRw = $on;
    }

    public function showConfirmDelete($id) {
        $this->tombolTambahRt = 0;
        $this->updateFormRt = 0;
        $this->tombolDeleteRt = $id;
    }

    public function showUpdateFormRt($id) {
        $this->tombolTambahRt = 0;
        $this->tombolDeleteRt = 0;

        $rt = RT::find($id);
        $this->noRt = $rt->nomorRt;
        $this->nikRt = $rt->nik;
        $this->namaRt = $rt->nama;
        $this->tandaTanganRt = $rt->tandaTangan;
        $this->updateFormRt = $id;
    }

    public function batalUpdateRt() {
        $this->updateFormRt = 0;
    }

    public function createDataRt() {
        $dataValid = $this->validate([
            'noRt' => 'required',
            'nikRt' => 'required',
            'namaRt' => 'required',
            'tandaTanganRt' => 'required|image|mimes:jpg,jpeg,png|max:5048',
        ]);

        $rt = RT::where('nomorRt', $this->noRt)->first();

        if(!$rt) {
            RT::create([
                'nomorRt' => $this->noRt,
                'nik' => $this->nikRt,
                'nama' => $this->namaRt,
                'tandaTangan' => $this->tandaTanganRt->store('img/tandaTanganRt'),
            ]);
        } else if($rt) {
            $rt->nomorRt = $this->noRt;
            $rt->nik = $this->nikRt;
            $rt->nama = $this->namaRt;
            $rt->tandaTangan = $this->tandaTanganRt->store('img/tandaTanganRt');
            $rt->save();
        }

        
        $this->noRt = '';
        $this->nikRt = '';
        $this->namaRt = '';
        $this->tandaTanganRt = '';
        $this->tombolTambahRt = 0;
        $this->emit('dataCreated');
    }

    public function updateDataRt($id) {
        $rt = RT::find($id);
        $rt->nomorRt = $this->noRt;
        $rt->nik = $this->nikRt;
        $rt->nama = $this->namaRt;
        $rt->tandaTangan = $this->tandaTanganRt;
        $rt->save();

        $this->updateFormRt = 0;
    }

    public function deleteDataRt($id) {
        $rt = RT::find($id);
        $rt->delete();
        $this->confirmDelete = 0;
        
    }

}

