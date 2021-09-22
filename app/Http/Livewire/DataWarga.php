<?php

namespace App\Http\Livewire;

use Livewire\Component;
use DB;
use Carbon\Carbon;
use App\Models\Member;
use App\Models\User;

class DataWarga extends Component
{
    public $confirmDelete = 0;
    public $showEditForm = 0;

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
        'dataCreated' => '$refresh'
    ];

    public function render()
    {
        setlocale(LC_TIME, 'id_ID');
        \Carbon\Carbon::setLocale('id');
        \Carbon\Carbon::now()->formatLocalized("%A, %d %B %Y");
        
        $members = DB::table('members')->orderBy('nik', 'ASC')->get();
        $r_t_s = User::join('admins', 'admins.nik', '=', 'users.nik')
                ->orderBy('admins.rt', 'ASC')
                ->select('admins.rt')
                ->get();

        $r_w_s = User::join('admins', 'admins.nik', '=', 'users.nik')
                ->orderBy('admins.rw', 'ASC')
                ->select('admins.rw')
                ->get();

        $ttl = array();
        $tanggalLahir = array();
        $tempatLahir = array();
        foreach($members as $member) {
            array_push($tanggalLahir, $member->tanggalLahir);
            array_push($tempatLahir, $member->tempatLahir);
        }
        for($i = 0; $i < count($tanggalLahir); $i++) {
            $ttlCarbon = $tempatLahir[$i] . ', ' . Carbon::parse($tanggalLahir[$i])->isoFormat('D MMMM Y');
            array_push($ttl, $ttlCarbon);
        }   
            
        return view('livewire.data-warga')->with('members', $members)
                                            ->with('ttl', $ttl)
                                            ->with('r_t_s', $r_t_s)
                                            ->with('r_w_s', $r_w_s);
    }
    public function showEditForm($id) {
        $member = Member::find($id);
        $this->nik = $member->nik;
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

        $this->showEditForm = $id;
    }

    public function batalUpdateData() {
        $this->showEditForm = 0;
    }

    public function showConfirmDelete($id) {
        $this->confirmDelete = $id;
    }

    public function updateData($id)
    {
        $member = Member::find($id);
        $member->nik = $this->nik;
        $member->nama = $this->nama;
        $member->jenisKelamin = $this->jenisKelamin;
        $member->tempatLahir = $this->tempat;
        $member->tanggalLahir = $this->tanggal;
        $member->agama = $this->agama;
        $member->status = $this->status;
        $member->pendidikan = $this->pendidikan;
        $member->negara = $this->negara;
        $member->pekerjaan = $this->pekerjaan;
        $member->noKk = $this->noKk;
        $member->rt = $this->rt;
        $member->rw = $this->rw;
        $member->alamat = $this->alamat;
        $member->save();

        $this->showEditForm = 0;
        $this->emit('dataCreated');
    } 
    
    public function deleteData($id) {
        $member = Member::find($id);
        $member->delete();
        $confirmDelete = 0;
    }
}
