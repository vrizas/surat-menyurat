<?php

namespace App\Http\Livewire;

use Livewire\Component;
use DB;
use App\Models\Report;
use App\Models\User;
use App\Models\Confirm;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ConfirmList extends Component
{
    public $confirmDelete = 0;
    public $confirmButton = 0;
    public $noRegister;
    public $tanggal;

    protected $listeners = [
        'showData' => '$refresh'
    ];

    public function render()
    {
        $user = Auth::user();
        
        $confirms = DB::table('confirms')
                    ->join('members', 'confirms.member_nik', '=', 'members.nik')
                    ->where('confirms.admin_nik', '=', $user->nik)
                    ->select('confirms.id', 'members.nama', 'confirms.keperluan', 'confirms.keterangan')
                    ->get();

        return view('livewire.confirm-list')->with('confirms', $confirms);
    }

    public function showConfirmDelete($id) {
        $this->confirmDelete = $id;
    }

    public function showConfirmData() {
        $user = Auth::user();
        $this->noRegister = DB::table('reports')->where('admin_nik', '=', $user->nik)->count() + 1;
        $this->tanggal = Carbon::now()->isoFormat('DD-MM-Y');

        $this->confirmButton = 1;
    }

    public function hideConfirmData() {
        $this->confirmButton = 0;
    }

    public function deleteConfirm($id) {
        $confirm = Confirm::find($id);
        $confirm->delete();
        $confirmDelete = 0;
    }

    public function confirm($id) {
        $confirm = Confirm::find($id);
        $user = Auth::user();
    
        Report::create([
            'no' => DB::table('reports')->where('admin_nik', '=', $user->nik)->count() + 1,
            'noRegister' => DB::table('reports')->where('admin_nik', '=', $user->nik)->count() + 1,
            'member_nik' => $confirm->member_nik,
            'tanggal' => Carbon::now()->isoFormat('DD-MM-Y'),
            'tujuan' => $confirm->tujuan,
            'keperluan' => $confirm->keperluan,
            'keterangan' => $confirm->keterangan,
            'jenisSurat' => $confirm->jenisSurat,
            'admin_nik' => $user->nik,
        ]);

        // $dataRegister = new SheetDB('ryjcf3y4rzhc0');
        // $dataRegister->create([
        //     'No.' => DB::table('reports')->count() + 1,
        //     'Nomor dan Tanggal' => DB::table('reports')->count() + 1 .', '.Carbon::now()->format('Y-m-d'),
        //     'Nama' => $this->nama,
        //     'RT/RW' =>$this->rt .' / '.$this->rw,
        //     'Keperluan' =>$this->keperluan,
        // ]);

        $confirm->delete();  
        $this->emit('showData');
    }
}
