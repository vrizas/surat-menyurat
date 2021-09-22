<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\User;

class Admin extends Component
{
    public $buttonHome = 1;
    public $buttonDataWarga = 0;
    public $buttonBukuRegister = 0;
    public $buttonProfile = 0;

    public function render()
    {
        $nik = Auth::user()->nik;
        $user = User::join('admins', 'admins.nik', '=', 'users.nik')
                ->where('users.nik', '=', $nik)
                ->select('users.name', 'admins.jabatan', 'admins.rt', 'admins.rw')
                ->first();

        $reports = DB::table('reports')
                    ->join('members', 'reports.member_nik', '=', 'members.nik')
                    ->where('reports.admin_nik', $nik)
                    ->select('reports.*', 'members.nama')
                    ->get();
        
        if(is_null($user)) {
            return view('livewire.failed');
        }
                
        return view('livewire.admin')->with('user', $user)->with('reports', $reports);
    }

    public function showHome() {
        $this->buttonHome = 1;
        $this->buttonDataWarga = 0;
        $this->buttonBukuRegister = 0;
        $this->buttonProfile = 0;
    }

    public function showDataWarga() {
        $this->buttonHome = 0;
        $this->buttonDataWarga = 1;
        $this->buttonBukuRegister = 0;
        $this->buttonProfile = 0;
    }

    public function showBukuRegister() {
        $this->buttonHome = 0;
        $this->buttonDataWarga = 0;
        $this->buttonBukuRegister = 1;
        $this->buttonProfile = 0;
    }

    public function showProfile() {
        $this->buttonHome = 0;
        $this->buttonDataWarga = 0;
        $this->buttonBukuRegister = 0;
        $this->buttonProfile = 1;
    }
}
