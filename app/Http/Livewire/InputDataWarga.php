<?php


namespace App\Http\Livewire;

use App\Models\Member;
use App\Models\Report;
use Livewire\Component;
use DB;
use Carbon\Carbon;
use SheetDB\SheetDB;
use Redirect;

class InputDataWarga extends Component
{
    public $confirm = 0;
    public $showForm = 0;
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

    protected $listeners = [
        'Show' => '$refresh'
    ];

    public function render()
    {
        return view('livewire.input-data-warga')->with('flashMessage', $this->flashMessage);
    }

    public function showForm($on) {
        $this->showForm = $on;
        $this->emit('Show');
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
                $this->alamat == '') {
                    $this->flashMessage = 'Isi semua data!';
            } else {
                $this->flashMessage = '';
                $this->confirm = $on;
                $this->emit('Show');
            }
            $this->emit('Show');
        } else {
            $this->confirm = $on;
            $this->emit('Show');
        }
    }

    public function cetakSurat()
    {
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
        }

        $this->confirm = 0;
        $this->showForm = 0;
        $this->emit('dataCreated');
    } 
}

