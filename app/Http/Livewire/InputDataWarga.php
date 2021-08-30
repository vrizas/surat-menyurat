<?php


namespace App\Http\Livewire;

use App\Models\Member;
use Livewire\Component;

class InputDataWarga extends Component
{
    public $nik;
    public $nama;
    public $jenisKelamin;
    public $tempat;
    public $tanggal;
    public $agama;
    public $status;
    public $negara;
    public $pendidikan;
    public $pekerjaan;
    public $noKk;
    public $rt;
    public $rw;
    public $alamat;
    public $keperluan;  

    public function render()
    {
        
        return view('livewire.input-data-warga');
    }

    public function createWarga()
    {
        Member::create([
            'nik' =>$this->nik,
            'nama' =>$this->nama,
            'jenis-kelamin' =>$this->jenisKelamin,
            'ttl' =>$this->tempat.','.$this->tanggal,
            'agama' =>$this->agama,
            'status' =>$this->status,
            'pendidikan' =>$this->pendidikan,
            'negara' =>$this->negara,
            'pendidikan' =>$this->pendidikan,
            'pekerjaan' =>$this->pekerjaan,
            'no-kk' =>$this->noKk,
            'rt' =>$this->rt,
            'rw' =>$this->rw,
            'alamat' =>$this->alamat,
            'keperluan' =>$this->keperluan,

        ]);
    }

    
}

