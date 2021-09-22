<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountSetting extends Component
{
    public $editProfile = 0;
    public $email;
    public $name;
    public $nik;
    public $jabatan;
    public $rt;
    public $rw;
    public $noTelp;
    public $alamat;
    public $password;
    public $confirmPassword;

    protected $listeners = [
        'refreshData' => '$refresh'
    ];

    public function render()
    {
        $nik = Auth::user()->nik;
        $user = User::join('admins', 'admins.nik', '=', 'users.nik')
                ->where('users.nik', '=', $nik)
                ->first();

        return view('livewire.account-setting')->with('user', $user);
    }

    public function showEditProfile($id) {
        $nik = Auth::user()->nik;
        $user = User::join('admins', 'admins.nik', '=', 'users.nik')
                ->where('users.nik', '=', $nik)
                ->first();

        $this->email = $user->email;
        $this->name = $user->name;
        $this->nik = $user->nik;
        $this->jabatan = $user->jabatan;
        $this->rt = $user->rt;
        $this->rw = $user->rw;
        $this->noTelp = $user->noTelp;
        $this->alamat = $user->alamat;

        $this->editProfile = 1;
    }

    public function hideEditProfile() {
        $this->editProfile = 0;
    }

    public function updateData($id) {
        $nik = Auth::user()->nik;
        $user = User::find($id);
        $admin = Admin::join('users', 'admins.nik', '=', 'users.nik')
                ->where('users.nik', '=', $nik)
                ->select('admins.*')
                ->first();
        
        $user->name = $this->name;
        $user->nik = $this->nik;
        $user->save();

        $admin->nik = $this->nik;
        $admin->jabatan = $this->jabatan;
        $admin->noTelp = $this->noTelp;
        $admin->alamat = $this->alamat;
        $admin->save();

        $this->editProfile = 0;
        $this->emit('refreshData');
    }

    public function updatePassword($id) {
        $user = User::find($id);
        if($this->password == $this->confirmPassword) {
            $user->password = Hash::make($this->password);
            $user->save();
            $this->password = '';
            $this->confirmPassword = '';
        }
    }
}
