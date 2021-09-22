<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Member;
use App\Models\Report;
use App\Models\Confirm;
use Carbon\Carbon;
use DB;

class PDFController extends Controller
{
    public function cetakSurat($nik) {
        $member = Member::where('nik', $nik)->first();
        $confirm = Confirm::where('member_nik', $nik)->latest()->first();
        $data = $this->getData($nik);

        $pdf = PDF::loadView('cetak', $data)->setPaper('a4', 'potrait');
        return $pdf->stream($confirm->jenisSurat.'_'.$member->nama.'.pdf');
    }

    public function downloadSurat($nik) {
        $member = Member::where('nik', $nik)->first();
        $confirm = Confirm::where('member_nik', $nik)->latest()->first();
        $data = $this->getData($nik);
        
        $pdf = PDF::loadView('cetak', $data)->setPaper('a4', 'potrait');
        return $pdf->download($confirm->jenisSurat.'_'.$member->nama.'.pdf');
    }

    public function downloadBukuRegister() {
        $reports = DB::table('reports')
                    ->join('members', 'reports.member_nik', '=', 'members.nik')
                    ->select('reports.id','reports.no','reports.noRegister','members.nama','reports.tanggal','reports.keperluan')
                    ->get();
        $data = [
            'reports' => $reports,
        ];

        $pdf = PDF::loadView('download-buku-register', $data)->setPaper('a4', 'potrait');;
        return $pdf->download('buku-register.pdf');
    }

    public function getData($nik) {
        setlocale(LC_TIME, 'id_ID');
        \Carbon\Carbon::setLocale('id');
        \Carbon\Carbon::now()->formatLocalized("%A, %d %B %Y");

        $member = Member::where('nik', $nik)->first();
        $tanggalLahir = Member::select('tanggalLahir')->where('nik', $nik)->first()->tanggalLahir;
        $tempatLahir = Member::select('tempatLahir')->where('nik', $nik)->first()->tempatLahir;
        $ttl = $tempatLahir . ', ' . Carbon::parse($tanggalLahir)->isoFormat('D MMMM Y');
        $confirm = Confirm::where('member_nik', $nik)->latest()->first();

        $today = Carbon::now()->isoFormat('D MMMM Y');
        $year = Carbon::now()->isoFormat('Y');
        $month = Carbon::now()->isoFormat('M');
        
        $data = [
            'member' => $member,
            'ttl' => $ttl,
            'confirm' => $confirm,
            'today' => $today,
            'year' => $year,
            'rmwMonth' => changeToRomawi($month),
            'noRw' => changeToRomawi($member->rw),
        ];
        return $data;
    }
}

function changeToRomawi($number){
    switch ($number){
        case 1: 
            return "I";
            break;
        case 2:
            return "II";
            break;
        case 3:
            return "III";
            break;
        case 4:
            return "IV";
            break;
        case 5:
            return "V";
            break;
        case 6:
            return "VI";
            break;
        case 7:
            return "VII";
            break;
        case 8:
            return "VIII";
            break;
        case 9:
            return "IX";
            break;
        case 10:
            return "X";
            break;
        case 11:
            return "XI";
            break;
        case 12:
            return "XII";
            break;
    }
}
