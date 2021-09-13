<?php

namespace App\Http\Livewire;

use Livewire\Component;
use DB;
use App\Models\Member;
use App\Models\Report;
use App\Models\Queue;
use Carbon\Carbon;

class ReportWarga extends Component
{
    public $id;
    public $no;
    public $nik;
    public $noRegisterRw;
    public $tanggal;
    public $keperluan;
    
    public function render()
    {   
        $reports = DB::table('reports')
                    ->join('members', 'reports.nik', '=', 'members.nik')
                    ->select('reports.id','reports.noRegisterRw','members.nama','reports.tanggal','reports.keperluan')
                    ->get();

        return view('livewire.report-warga')->with('reports', $reports);
    }


    public function deleteReport($id) {
        $report = Report::find($id);
        $report->delete();
        $this->emit('deleteReport');
    }

    public function showForm($id) {
        $member = Member::find($id);
        $this->id = $report->id;
        $this->no = $report->no;
        $this->noRegisterRw = $report->noRegisterRw;
        $this->nama = $member->nama;
        $this->nik = $member->nik;
        $this->tanggal = $report->tanggal;
        $this->keperluan = $report->keperluan;


        $this->showForm = $id;
    }

    
}
