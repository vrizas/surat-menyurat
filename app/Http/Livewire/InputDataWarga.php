<?php


namespace App\Http\Livewire;

use App\Models\Member;
use App\Models\Report;
use App\Models\User;
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
        $r_t_s = User::join('admins', 'admins.nik', '=', 'users.nik')
                ->orderBy('admins.rt', 'ASC')
                ->select('admins.rt')
                ->get();

        $r_w_s = User::join('admins', 'admins.nik', '=', 'users.nik')
                ->orderBy('admins.rw', 'ASC')
                ->select('admins.rw')
                ->get();
        return view('livewire.input-data-warga')->with('flashMessage', $this->flashMessage)->with('r_t_s',$r_t_s)->with('r_w_s',$r_w_s);
    }

    public function showForm($on) {
        $this->showForm = $on;
        $this->emit('Show');
    }

    public function createData()
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
        ]);

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
            $this->confirm = 0;
            $this->emit('Show');
        }

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
        }

        $this->confirm = 0;
        $this->showForm = 0;
        $this->emit('dataCreated');
    } 
}

