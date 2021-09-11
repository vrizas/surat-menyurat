<?php

namespace App\Http\Livewire;

use App\Models\Member;
use App\Models\Report;
use Livewire\Component;
use DB;
use Carbon\Carbon;
use SheetDB\SheetDB;
use Redirect;

class CetakSuratPengantar extends Component
{
    public $confirm = 0;
    public $flashMessage;

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

    protected $listeners = [
        'Cetak' => '$refresh'
    ];

    public function render()
    {
        return view('livewire.cetak-surat-pengantar')->with('flashMessage', $this->flashMessage);
    }

    public function showConfirm($on) {
        if($on == 1) {
            if($this->nik == '' ||
                $this->nama == '' ||
                $this->jenisKelamin == '' ||
                $this->tempat == '' ||
                $this->tanggal == '' ||
                $this->agama == '' ||
                $this->status == '' ||
                $this->pendidikan == '' ||
                $this->negara == '' ||
                $this->pekerjaan == '' ||
                $this->noKk == '' ||
                $this->rt == '' ||
                $this->rw == '' ||
                $this->alamat == '' ||
                $this->keperluan == '') {
                    $this->flashMessage = 'Isi semua data!';
            } else {
                $this->flashMessage = '';
                $this->confirm = $on;
            }
            $this->emit('Cetak');
        } else {
            $this->confirm = $on;
            $this->emit('Cetak');
        }
    }

    public function cetakSurat()
    {
        $dataRegister = new SheetDB('ryjcf3y4rzhc0');

        $member = Member::where('nik', $this->nik)->first();
        \Carbon\Carbon::setLocale('id');
        \Carbon\Carbon::now()->formatLocalized("%A, %d %B %Y");

        $dataValid = $this->validate([
            'nik' => 'required',
            'nama' => 'required',
            'jenisKelamin' => 'required',
            'tempat' => 'required',
            'tanggal' => 'required',
            'agama' => 'required',
            'status' => 'required',
            'negara' => 'required',
            'pendidikan' => 'required',
            'pekerjaan' => 'required',
            'noKk' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'alamat' => 'required',
            'keperluan' => 'required',
        ]);

        if(!$member) {
            Member::create([
                'nik' =>$this->nik,
                'nama' =>$this->nama,
                'jenisKelamin' =>$this->jenisKelamin,
                'ttl' =>$this->tempat.', '.Carbon::parse($this->tanggal)->isoFormat('D MMMM Y'),
                'agama' =>$this->agama,
                'status' =>$this->status,
                'pendidikan' =>$this->pendidikan,
                'negara' =>$this->negara,
                'pekerjaan' =>$this->pekerjaan,
                'noKk' =>$this->noKk,
                'rt' =>$this->rt,
                'rw' =>$this->rw,
                'alamat' =>$this->alamat,
            ]);
        } else if($member) {
            $member->nama = $this->nama;
            $member->jenisKelamin = $this->jenisKelamin;
            $member->ttl = $this->tempat.', '.Carbon::parse($this->tanggal)->isoFormat('D MMMM Y');
            $member->agama = $this->agama;
            $member->status = $this->status;
            $member->negara = $this->negara;
            $member->pendidikan = $this->pendidikan;
            $member->pekerjaan = $this->pekerjaan;
            $member->noKk = $this->noKk;
            $member->rt = $this->rt;
            $member->rw = $this->rw;
            $member->alamat = $this->alamat;
            $member->save();
        }

        Report::create([
            'no' => DB::table('reports')->count() + 1,
            'noRegisterRw' => DB::table('reports')->count() + 1,
            'nik' => $this->nik,
            'tanggal' => Carbon::now()->isoFormat('DD-MM-Y'),
            'keperluan' => $this->keperluan,
        ]);

        // $dataRegister->create([
        //     'No.' => DB::table('reports')->count() + 1,
        //     'Nomor dan Tanggal' => DB::table('reports')->count() + 1 .', '.Carbon::now()->format('Y-m-d'),
        //     'Nama' => $this->nama,
        //     'RT/RW' =>$this->rt .' / '.$this->rw,
        //     'Keperluan' =>$this->keperluan,
        // ]);

        $this->confirm = 0;
        $this->emit('Cetak');

        return redirect()->to('cetak-surat/'. $this->nik);
    }
    
}
