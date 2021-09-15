<?php

namespace App\Http\Livewire;

use App\Models\Member;
use App\Models\Queue;
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
        $r_t_s = DB::table('r_t_s')->orderBy('nomorRt', 'ASC')->get();
        $r_w_s = DB::table('r_w_s')->orderBy('nomorRw', 'ASC')->get();
        
                    
        return view('livewire.cetak-surat-pengantar')->with('flashMessage', $this->flashMessage)->with('r_t_s',$r_t_s)->with('r_w_s',$r_w_s);
    }

    public function updatedNik() {
        $member = Member::where('nik', ((int)$this->nik))->first();
        if($member) {
            $this->nama = $member->nama;
            $this->jenisKelamin = $member->jenisKelamin;
            $this->tempat = $member->tempatLahir;
            $this->tanggal = $member->tanggalLahir;
            $this->agama = $member->agama;
            $this->status = $member->status;
            $this->pendidikan = $member->pendidikan;
            $this->negara = $member->negara;
            $this->pekerjaan = $member->pekerjaan;
            $this->noKk = $member->noKk;
            $this->rt = $member->rt;
            $this->rw = $member->rw;
            $this->alamat = $member->alamat;
        }
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
        $member = Member::where('nik', $this->nik)->first();

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
                'tempatLahir' =>$this->tempat,
                'tanggalLahir' =>$this->tanggal,
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
            $member->tempatLahir = $this->tempat;
            $member->tanggalLahir = $this->tanggal;
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

        Queue::create([
            'nik' => $this->nik,
            'keperluan' => $this->keperluan,
        ]);
        
        $this->nik = '';
        $this->nama = '';
        $this->jenisKelamin = '';
        $this->tempat = '';
        $this->tanggal = '';
        $this->agama = '';
        $this->status = '';
        $this->negara = '';
        $this->pendidikan = '';
        $this->pekerjaan = '';
        $this->noKk = '';
        $this->rt = '';
        $this->rw = '';
        $this->alamat = '';
        $this->keperluan = '';
        $this->confirm = 0;
    }
    
}
